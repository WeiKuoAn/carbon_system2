<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustData;
use App\Models\IndustryCategory;
use App\Models\Branch;
use App\Models\User;
use App\Models\CustProject;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function customer_data(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $cust = CustData::where('id',  $request->cust_id)->first();

            if($cust){
                return Response($cust);
            }
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = CustData::paginate(50);
        return view('customer.index')->with('datas', $datas);
    }

    public function Create()
    {
        return view('customer.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //新增帳號
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = '2';
        $user->group_id = '2';
        $user->save();

        $user_data = User::orderby('id', 'DESC')->first();

        //新增客戶資料
        $cust_data = new CustData;
        $cust_data->user_id = $user_data->id;
        $cust_data->contact_name = $request->contact_name;
        $cust_data->contact_job = $request->contact_job;
        $cust_data->contact_email = $request->contact_email;
        $cust_data->contact_phone = $request->contact_phone;
        $cust_data->registration_no = $request->registration_no;
        $cust_data->county = $request->county;
        $cust_data->district = $request->district;
        $cust_data->address = $request->address;
        $cust_data->save();

        //新增客戶計畫案內容
        $project = new CustProject;
        $project->year = Carbon::now()->year;
        $project->user_id = $user_data->id;
        $project->type = $request->type;
        $project->nas_link = $request->nas_link;
        $project->save();

        return redirect()->route('customer.create')->with('success', '客戶已成功新增');
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
