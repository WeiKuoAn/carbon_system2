<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iso14064;
use App\Models\Scope;

class Iso14064Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Iso14064::get();
        return view('iso14064.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scopes = Scope::get();
        return view('iso14064.create')->with('scopes', $scopes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // 验证请求数据
         $validatedData = $request->validate([
            'scope_id' => 'required|exists:scopes,id',
            'name' => 'required|string',
        ]);

        // 创建新的 iso14064 记录
        $iso14064 = Iso14064::create($validatedData);

        return redirect()->route('iso14064.index');
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
        $scopes = Scope::get();
        $data = Iso14064::where('id', $id)->first();
        return view('iso14064.edit')->with('data',$data)->with('scopes', $scopes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 验证请求数据
        $validatedData = $request->validate([
            'scope_id' => 'required|exists:scopes,id',
            'name' => 'required|string',
        ]);

        // 更新 iso14064 记录
        $data = Iso14064::where('id', $id)->first();
        $data->update($validatedData);

        // 重定向回 iso14064
        return redirect()->route('iso14064.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
