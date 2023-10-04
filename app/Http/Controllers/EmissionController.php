<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emission;
use App\Models\BasicInventory;

class EmissionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('133');
        $data = $request->validate([
            'basic_inventory_id' => 'required|string|max:20',
            'scope_id' => 'required|string|max:20',
            'source_id' => 'required|string|max:20',
            'iso16064_id' => 'required|string|max:20',
            'ghg_id' => 'required|string|max:20',
            'process_id' => 'nullable|string|max:20',
            'device_id' => 'nullable|string|max:20',
            'electricity_type' => 'nullable|string|max:20',
            'electricity_source' => 'nullable|string|max:20',
            'fuel' => 'nullable|string|max:20',
            'text' => 'nullable|string',
            'image' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        // 使用验证后的数据创建新记录

        $emission = Emission::create($data);
        return response()->json($emission);
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
        $inventory = BasicInventory::orderBy('id', 'desc')->first();
        
        // 注意：这里我们直接使用了 $id，不需要再从请求中获取 editId
        $emission = Emission::where('basic_inventory_id', $inventory->id)->where('id', $id)->first();
        
        return response()->json($emission);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'basic_inventory_id' => 'required|string|max:20',
            'scope_id' => 'required|string|max:20',
            'source_id' => 'required|string|max:20',
            'iso16064_id' => 'required|string|max:20',
            'ghg_id' => 'required|string|max:20',
            'process_id' => 'nullable|string|max:20',
            'device_id' => 'nullable|string|max:20',
            'electricity_type' => 'nullable|string|max:20',
            'electricity_source' => 'nullable|string|max:20',
            'fuel' => 'nullable|string|max:20',
            'text' => 'nullable|string',
            'image' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        // 使用验证后的数据创建新记录

        $inventory = BasicInventory::orderBy('id', 'desc')->first();

        // 找到需要更新的 Emission 模型实例
        $emission = Emission::where('basic_inventory_id', $inventory->id)
            ->where('id', $id)
            ->first();

        // 如果找到了模型实例，更新它
        if ($emission) {
            $emission->update($data);
            return response()->json($data);
        } else {
            // 如果没有找到模型实例，您可能需要处理这种情况，例如返回错误响应
            return response()->json(['error' => 'Emission not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
