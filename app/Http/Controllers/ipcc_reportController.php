<?php

namespace App\Http\Controllers;

use App\Models\ipcc_report;
use App\Models\ipcc_list;
use Illuminate\Http\Request;

class ipcc_reportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = ipcc_report::paginate(50);
        return view('ipcc_report.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('ipcc_report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 驗證輸入資料
        
        $validated = $request->validate([
            'year'=> 'required|string|max:10',
            //$optionValue = $request -> input('name'),
             
            'quote'=>'required|string',
            // 'code'=>'required|integer',
            // 'co2name'=>'required|string',
            // 'values'=>'required|float',
            //'name' =>'required|in:0,1,2,3,4,5,6',
            
        ]);
        

        // 儲存資料
        $reports = ipcc_report::create($validated);
        //$reports = ipcc_list::create($validated);
        

        // 重定向到客戶列表頁面或其他適當位置
        return redirect()->route('ipcc_report.index')->with('success', '客戶已成功新增');
    }

    /**
     * Display the specified resource.
     */
    public function show(ipcc_report $ipcc_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ipcc_report $ipcc_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ipcc_report $ipcc_report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ipcc_report $ipcc_report)
    {
        //
    }
}
