<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\IndustryCategory;
use App\Models\Branch;

class CustomerController extends Controller
{
    public function customer_data(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $cust = Customer::where('id',  $request->cust_id)->first();

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
        $datas = Customer::paginate(50);
        return view('customer.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = IndustryCategory::get();
        return view('customer.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('1');
         // 驗證輸入資料
         $validated = $request->validate([
            'name' => 'required|string|max:20',
            'industry_id' => 'required|string|max:10',
            'primary_contact_name' => 'required|string|max:10',
            'primary_contact_phone' => 'required|string|max:20',
            'primary_contact_email' => 'required|string|max:100',
            'contact_job' => 'required|string|max:20',
            'county' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'business_registration_no' => 'required|string|max:100',
            'established_date' => 'nullable|date',
            'operational_status' => 'required|in:0,1',
            'company_scale' => 'required|in:0,1,2,3',
            'stock_status' => 'required|in:0,1,2',
            'sales_orientation' => 'required|string|max:10',
            'sales_region' => 'required|string|max:10',
            'permission_status' => 'required|in:0,1,2',
            'note' => 'nullable|string',
        ]);

        // 儲存資料
        $customer = Customer::create($validated);

        $customer_data = Customer::orderby('id', 'desc')->first();
        
        $branch = Branch::where('customer_id',$customer_data->id)->first();
        if(!isset($branch))
        {
            $branch_data = new Branch();
            $branch_data->customer_id = $customer_data->id;
            $branch_data->name = '總公司';
            $branch_data->contact_name = $request->primary_contact_name;
            $branch_data->contact_phone = $request->primary_contact_phone;
            $branch_data->contact_email = $request->primary_contact_email;
            $branch_data->address = $request->county.$request->district.$request->address;
            $branch_data->save();
        }

        // 重定向到客戶列表頁面或其他適當位置
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
