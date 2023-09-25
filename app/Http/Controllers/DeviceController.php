<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Device::orderby('code')->get();
        return view('device.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
        ]);

        $data = new Device;
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();

        return redirect()->route('device.index');
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
        $data = Device::where('id', $id)->first();
        return view('device.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 验证请求数据
        $validatedData = $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
        ]);
        $data = Device::where('id', $id)->first();
        $data->update($validatedData);

        // 重定向回 iso14064
        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
