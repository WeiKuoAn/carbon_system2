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
use App\Models\Iso14064;
use App\Models\GhgProtocol;

class SimulationInspectionController extends Controller
{

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

        $inventory = BasicInventory::orderBy('id', 'desc')->first();
        $inventory->update($data);      

        // 使用验证后的数据创建新记录
        

        return redirect()->route('simulation-inspection.step3');
    }


    public function step3()
    {   
        $scopes = Scope::get();
        $devices = Device::get();
        $iso14064s = Iso14064::get();
        $ghgProtocols = GhgProtocol::get();
        return view('simulation-inspection.step3')->with('scopes', $scopes)
                                                  ->with('devices', $devices)
                                                  ->with('iso14064s', $iso14064s)
                                                  ->with('ghgProtocols', $ghgProtocols);
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
        //
    }
}
