<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Ui\Presets\React;
use Termwind\Components\Raw;
use App\Models\BasicInventory;
use App\Models\Customer;
use App\Models\Scope;
use App\Models\IndustryCategory;
use App\Models\Device;
use App\Models\Emission;
use App\Models\EmissionData;
use App\Models\Iso14064;
use App\Models\GhgProtocol;
use App\Models\process;
use App\Models\source;
use App\Models\CarbonReduction;
use Illuminate\Support\Facades\DB;

class SimulationInspectionController extends Controller
{
    /*ajax*/
    public function iso14064_datas(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $Iso14064s = Iso14064::where('scope_id', $request->scope_id)->get();

            if(count($Iso14064s) > 0){
                foreach ($Iso14064s as $key => $Iso14064) {
                    $output.= '<option value="'.$Iso14064->id.'">'.$Iso14064->name."</option>'";
                  }
            }else{
                $output= '<option value=" ">'."請選擇..."."</option>'";
            }
            return Response($output);
        }
    }

    public function ghg_datas(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            if($request->iso16064_id == '1'){
                $ghgs = GhgProtocol::where('iso14064_id', '1')->get();
            }elseif($request->iso16064_id =='2'){
                $ghgs = GhgProtocol::where('iso14064_id', '2')->get();
            }else{
                $ghgs = GhgProtocol::whereNull('iso14064_id')->get();
            }
            
            if(count($ghgs) > 0){
                foreach ($ghgs as $key => $ghg) {
                    $output.= '<option value="'.$ghg->id.'">'.$ghg->name."</option>'";
                  }
            }else{
                $output= '<option value=" ">'."請選擇..."."</option>'";
            }
            return Response($output);
        }
    }

    public function step1()
    {
        $customers = Customer::get();
        $categories = IndustryCategory::get();
        return view('simulation-inspection.step1')->with('customers',$customers)->with('categories',$categories);
    }
    
    public function step1_store(Request $request)
    {
        // 验证请求数据
        $data = $request->validate([
            'customer_id' => 'required|string',
            'branch_id' => 'required|string',
        ]);

        // 使用验证后的数据创建新记录
        $inventory = BasicInventory::create($data);

        return redirect()->route('simulation-inspection.step2');
    }

    public function step2()
    {   
        $years = range(Carbon::now()->year, 1990);
        return view('simulation-inspection.step2')->with('years', $years);
    }

    public function step2_store(Request $request)
    {
        $inventory = BasicInventory::orderBy('id', 'desc')->first();

        $check = BasicInventory::where('year',$request->year)->where('customer_id',$inventory->customer_id)->first();
        // dd($check);
        if(!isset($check)){
            // 验证请求数据
            $data = $request->validate([
                'year' => 'required|string|max:20',
                'reason' => 'required|in:0,1,2',
                'norm' => 'required|in:0,1,2',
                'ipcc_id' => 'required|string|max:20',
                'verification_agency' => 'required|string|max:100',
                'base_year' => 'required|in:0,1',
            ]);
            // dd($data);

            $inventory->update($data);      
            // 使用验证后的数据创建新记录
        
            return redirect()->route('simulation-inspection.step3');
        }else{
            return redirect()->route('simulation-inspection.step2')->with('error', '盤查年度已存在，請重新選擇');
        }
    }


    public function step3()
    {   
        $inventory = BasicInventory::orderBy('id', 'desc')->first();
        $scopes = Scope::get();
        $devices = Device::get();
        $iso14064s = Iso14064::get();
        $ghgProtocols = GhgProtocol::get();
        $proces = process::get();
        $sources = source::get();
        $datas = [];
        foreach($scopes as $scope)
        {
            $datas[$scope->id]['name'] = $scope->name;
            $datas[$scope->id]['emission_datas'] = Emission::where('basic_inventory_id', $inventory->id)->where('scope_id',$scope->id)->get();
        }
        // dd($datas);
        return view('simulation-inspection.step3')->with('scopes', $scopes)
                                                  ->with('devices', $devices)
                                                  ->with('iso14064s', $iso14064s)
                                                  ->with('ghgProtocols', $ghgProtocols)
                                                  ->with('proces', $proces)
                                                  ->with('sources', $sources)
                                                  ->with('inventory',$inventory)
                                                  ->with('datas', $datas);
    }

    public function step4(Request $request)
    {
        $inventory = BasicInventory::orderBy('id', 'desc')->first();
        $datas = Emission::where('basic_inventory_id',$inventory->id)->get();
        $total = 0;
        $emission_ids = [];
        foreach($datas as $data)
        {
            $item = EmissionData::where('emission_id',$data->id)->first();
            if(isset($item->emission_value))
            {
                $total += intval($item->emission_value);
            }
            $emission_ids[] = $data->id;
        }

        $items = DB::table('emission')
                ->join('emission_data', 'emission.id', '=', 'emission_data.emission_id')
                ->join('process', 'emission.process_id', '=', 'process.id')
                ->select('emission.*', 'emission_data.*', 'process.description') // 选择您需要的列
                ->whereIn('emission_id',$emission_ids)->orderby('emission_value','desc')
                ->get();

        // dd($totals);
        return view('simulation-inspection.step4')->with('datas',$datas)->with('total',$total)->with('items',$items);
    }

    public function step5(Request $request)
    {
        
        return view('simulation-inspection.step5');
    }

    public function step6(Request $request)
    {
        $inventory = BasicInventory::orderBy('id', 'desc')->first();
        $datas = CarbonReduction::where('customer_id',$inventory->customer_id)->get();
        return view('simulation-inspection.step6')->with('inventory',$inventory)->with('datas',$datas);
    }

    public function step6_store(Request $request)
    {
        // dd($request->all());
        // 驗證表單數據
        $validatedData = $request->validate([
            'customer_id' => 'required|string',
            'deadline' => 'required|date',
            'budget' => 'required|numeric',
            'measure_name' => 'required|string',
            'description' => 'required|string',
            'implementation' => 'required|string',
            'progress_status' => 'required|string|max:50',
        ]);
        // dd($validatedData);

        // 創建新的減排資料
        $carbonReduction = CarbonReduction::create($validatedData);
        
        // 返回成功響應
        return response()->json($carbonReduction, 201); // 201 表示已創建成功
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BasicInventory::get();
        return view('simulation-inspection.index')->with('datas',$datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('simulation-inspection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = BasicInventory::where('id', $id)->first();
        CarbonReduction::where('customer_id', $inventory->customer_id)->delete();
        $emissions = Emission::where('basic_inventory_id',$inventory->id)->get();
        foreach($emissions as $emission)
        {
            EmissionData::where('emission_id',$emission->id)->delete();
        }
        Emission::where('basic_inventory_id',$inventory->id)->delete();
        BasicInventory::where('id', $id)->delete();

        return redirect()->route('simulation-inspection.index');
    }
}
