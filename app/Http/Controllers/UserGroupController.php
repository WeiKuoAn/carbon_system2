<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function index()
    {
        $datas = UserGroup::whereNotIn('id',[2])->get();
        return view('user.groups')->with('datas', $datas);
    }

    public function create()
    {
        return view('user.add_group');
    }

    public function store(Request $request)
    {
        $data = new UserGroup();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('user.groups');
    }

    public function edit(Request $request , $id)
    {
        $data = UserGroup::where('id',$id)->first();
        return view('user.edit_group')->with('data', $data);
    }

    public function update(Request $request,$id)
    {
        $data = UserGroup::where('id',$id)->first();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('user.groups');
    }

    public function delete(Request $request , $id)
    {
        $data = UserGroup::where('id',$id)->first();
        return view('user.del_group')->with('data', $data);
    }

    public function destory(Request $request,$id)
    {
        $data = UserGroup::where('id',$id)->first();
        $data->delete();
        return redirect()->route('user.groups');
    }
}
