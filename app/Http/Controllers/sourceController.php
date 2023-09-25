<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\source;

class sourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = source::get();
        return View('source.create')->with('datas', $datas);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 驗證輸入資料
        
        $validated = $request->validate([
            
            
            'name'=>'required|string',
            
            
        ]);
        

        // 儲存資料
        $reports = source::create($validated);
        //$reports = ipcc_list::create($validated);
        

        // 重定向到客戶列表頁面或其他適當位置
        return redirect()->route('source.create')->with('success', '客戶已成功新增');
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
        $source = source::find($id);
        
        return view("source.edit",compact('source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            
            
            'name'=>'required|string',
            
            
        ]);
        
        $source = source::find($id);
        $source->update($validatedData);
        $source->save();
        
        return redirect()->route('source.create')->with('success', '客戶已成功新增');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $source = source::find($id);
        if ($source) {
            $source->delete();
        } 
        return view('source.success')->with('success', '客戶已成功新增');
    }
}
