<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scope;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Scope::get();
        return view('scope.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scope.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $scope = new Scope;
        $scope->name = $request->name;
        $scope->save();

        return redirect()->route('scope.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Scope::where('id', $id)->first();
        return view('scope.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string',
        ]);
        $data = Scope::where('id', $id)->first();
        $data->update($request->only('name'));
        return redirect()->route('scope.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
