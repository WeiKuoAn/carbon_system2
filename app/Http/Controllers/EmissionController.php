<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emission;

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
