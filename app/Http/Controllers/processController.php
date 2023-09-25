<?php

namespace App\Http\Controllers;

use App\Models\process;
use Illuminate\Http\Request;

class processController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = process::paginate(50);
        return view('process.create')->with('datas', $datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->code);
        $validated = $request->validate([
            'code'=> 'required|string|max:255',
            //$optionValue = $request -> input('name'),
             
            'description'=>'required|string|max:255',
            // 'code'=>'required|integer',
            // 'co2name'=>'required|string',
            // 'values'=>'required|float',
            //'name' =>'required|in:0,1,2,3,4,5,6',
            
        ]);
        

        // 儲存資料
        $reports = process::create($validated);
        //$reports = ipcc_list::create($validated);
        

        // 重定向到客戶列表頁面或其他適當位置
        return redirect()->route('process.create')->with('success', '客戶已成功新增');
    }

    /**
     * Display the specified resource.
     */
    public function show(process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = process::find($id);
        return view("process.edit",compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            
            
            'code'=> 'required|string|max:255',
            //$optionValue = $request -> input('name'),
             
            'description'=>'required|string|max:255',
            
            
        ]);
        
        $process = process::find($id);
        $process->update($validatedData);
        $process->save();
        
        return redirect()->route('process.create')->with('success', '客戶已成功新增');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $process = process::find($id);
        if ($process) {
            $process->delete();
        } 
        return view('process.success')->with('success', '客戶已成功新增');
    }
}
