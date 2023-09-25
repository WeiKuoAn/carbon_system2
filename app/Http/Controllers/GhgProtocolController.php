<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Iso14064;
Use App\Models\GhgProtocol;

class GhgProtocolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = GhgProtocol::get();
        return view('ghg_protocol.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iso14064s = Iso14064::get();
        return view('ghg_protocol.create')->with('iso14064s', $iso14064s);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->iso14064_id);
        // 验证请求数据
        $validatedData = $request->validate([
            // 'iso14064_id' => 'nullable|exists:iso14064,id',
            'name' => 'required|string',
        ]);
        // dd($validatedData);

        // 创建新的 iso14064 记录
        $ghgProtocol = GhgProtocol::create($validatedData);

        return redirect()->route('ghg_protocol.index');
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
        $iso14064s = Iso14064::get();
        $data = GhgProtocol::where('id', $id)->first();
        return view('ghg_protocol.edit')->with('data',$data)->with('iso14064s', $iso14064s);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 验证请求数据
        $validatedData = $request->validate([
            'iso14064_id' => 'nullable|exists:iso14064,id',
            'name' => 'required|string',
        ]);

        // 更新 iso14064 记录
        $data = GhgProtocol::where('id', $id)->first();
        $data->update($validatedData);

        // 重定向回 iso14064
        return redirect()->route('ghg_protocol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
