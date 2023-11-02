<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Carbon\Carbon;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use App\Models\CarbonReduction;

class SimulationInspectionEditController extends Controller
{
    public function step1_show($id)
    {
        $data = BasicInventory::where('id',$id)->first();
        $customers = Customer::get();
        $branches = Branch::where('customer_id',$data->customer_id)->get();
        $categories = IndustryCategory::get();
        return view('simulation-inspection-edit.step1')->with('data',$data)
                                                       ->with('categories',$categories)
                                                       ->with('customers',$customers)
                                                       ->with('branches',$branches);
    }

    public function step1_update(Request $request ,$id)
    {
        // 验证请求数据
        $data = $request->validate([
            'customer_id' => 'required|string',
            'branch_id' => 'required|string',
        ]);

        // 使用验证后的数据创建新记
        $inventory = BasicInventory::where('id',$id)->first();
        // dd($inventory);
        $inventory = $inventory->update($data);

        return redirect()->route('simulation-inspection.step2');
    }

    public function step2_show($id)
    {   
        $years = range(Carbon::now()->year, 1990);
        $data = BasicInventory::where('id',$id)->first();
        // dd($data);
        return view('simulation-inspection-edit.step2')->with('data',$data)->with('years', $years);
    }

    public function step2_update(Request $request ,$id)
    {
        $inventory = BasicInventory::where('id', $id)->first();

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
        
            return redirect()->route('simulation-inspection-edit.step3.show',$id);
        }else{
            return redirect()->route('simulation-inspection-edit.step2.show',$id    )->with('error', '盤查年度已存在，請重新選擇');
        }
    }

    public function step3_show($id)
    {   
        $inventory = BasicInventory::where('id',$id)->first();
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
        return view('simulation-inspection-edit.step3')->with('scopes', $scopes)
                                                  ->with('devices', $devices)
                                                  ->with('iso14064s', $iso14064s)
                                                  ->with('ghgProtocols', $ghgProtocols)
                                                  ->with('proces', $proces)
                                                  ->with('sources', $sources)
                                                  ->with('inventory',$inventory)
                                                  ->with('datas', $datas);
    }

    public function step4_show($id)
    {
        $inventory = BasicInventory::where('id', $id)->first();
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
        return view('simulation-inspection-edit.step4')->with('inventory',$inventory)->with('datas',$datas)->with('total',$total)->with('items',$items);
    }

    public function step5_show($id)
    {
        $data = BasicInventory::where('id', $id)->first();
        return view('simulation-inspection-edit.step5')->with('data',$data);
    }

    public function step6_show($id)
    {
        $inventory = BasicInventory::where('id',$id)->first();
        $datas = CarbonReduction::where('customer_id',$inventory->customer_id)->get();
        return view('simulation-inspection-edit.step6')->with('inventory',$inventory)->with('datas',$datas);
    }


}
