<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use Illuminate\Http\Request;
use App\Models\EmissionData;
use Termwind\Components\Raw;

class EmissionItemController extends Controller
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
        // 注意：这里我们直接使用了 $id，不需要再从请求中获取 editId
        $emission_item = EmissionData::where('emission_id', $id)->first();
        return response()->json($emission_item);
    }

    public function emission_item_datas(Request $request)
    {

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $emission_item = EmissionData::where('emission_id',$id)->first();
        
        if(isset($emission_item))
        {
            $data = $request->validate([
                'emission_id' => 'nullable|string|max:100',
                'value_type' => 'required|in:1,2,3',
                'value' => 'required|string|max:191',
                'unit' => 'nullable|string|max:191',
                'emission_value' => 'required|string|max:191',
            ]);

            $emission_item->update($data);

            return response()->json($emission_item);
        }else{
            $data = $request->validate([
                'emission_id' => 'nullable|string|max:100',
                'value_type' => 'required|in:1,2,3',
                'value' => 'required|string|max:191',
                'unit' => 'nullable|string|max:191',
                'emission_value' => 'required|string|max:191',
            ]);
    
            $emission_item = EmissionData::create($data);
    
            return response()->json($emission_item);         
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

