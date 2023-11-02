<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\Starting;
use App\Models\BoundarySetting;
use App\Models\Stage;
use App\Models\EmissionSourceIdentification;
use App\Models\SystemCalculation;
use App\Models\AuditStorage;
use Carbon\Carbon;

class InspectionhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = range(Carbon::now()->year, 1990);
        $customers = Customer::get();
        return view('inspection.inspection1')->with('customers',$customers)->with('years', $years);
    }

    // public function create2()
    // {
    //     // return view('inspection.inspection2');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::where('id',$request->customber_id_text)->first();
        $branch = Branch::where('id',$request->branch_id_text)->first();
        
        $stage = new Stage();
        $stage->customer_id = $request->customer_id;
        $stage->branch_id = $request->branch_id;
        $stage->year = $request->year;
        $stage->stage_number = 1;
        $stage->save();

        $stage_data = Stage::orderby('id','desc')->first();

        $step01 = new Starting();
        $step01->stage_id = $stage_data->id;
        if($request->Step1_inputGroupFile01_filename != null){
            $step01->meeting_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step1_inputGroupFile01_filename;
        }
        $step01->commitment_date = $request->commitment_date;
        if($request->Step1_inputGroupFile02_filename != null){
            $step01->organization_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step1_inputGroupFile02_filename;
        }
        $step01->save();

        $step02 = new BoundarySetting();
        $step02->stage_id = $stage_data->id;
        $step02->standard = $request->standard;
        $step02->organizational_boundary_setting = $request->organizational_boundary_setting;
        $step02->boundary_setting = $request->boundary_setting;
        $step02->boundary_address = $request->address;
        $step02->reference_year = $request->year;
        $step02->save();

        $step03 = new EmissionSourceIdentification();
        $step03->stage_id = $stage_data->id;
        if($request->Step3_inputGroupFile01_filename != null){
            $step03->activity_data_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step3_inputGroupFile01_filename;
        }
        $step03->photo_collection = null;
        $step03->save();

        $step04 = new SystemCalculation();
        $step04->stage_id = $stage_data->id;
        if($request->Step4_inputGroupFile01_filename != null){
            $step04->emission_inventory_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step4_inputGroupFile01_filename;
        }
        $step04->verification_unit_review = $request->verification_unit_review;
        $step04->verification_unit_review_date = $request->verification_unit_review_date;
        $step04->save();
        
        $step05 = new AuditStorage();
        $step05->stage_id = $stage_data->id;
        $step05->internal_verification = $request->internal_verification;
        if($request->Step5_inputGroupFile01_filename != null){
            $step05->ares_international_certification_iso14064_1 = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile01_filename;
        }
        if($request->Step5_inputGroupFile02_filename != null){
            $step05->ares_international_certification_zero_carbon = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile02_filename;
        }
        if($request->Step5_inputGroupFile03_filename != null){
            $step05->un_carbon_certificate = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile03_filename;;
        }
        if($request->Step5_inputGroupFile04_filename != null){
            $step05->inventory_checklist = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile04_filename;;
        }
        $step05->save();
        // dd('234');

        return response()->json(['redirect_url' => route('inspection.edit', $stage_data->id)]);
        // dd($request->all());
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
        $data = Stage::where('id',$id)->first();
        $customers = Customer::get();
        $years = range(Carbon::now()->year, 1990);
        $branches = Branch::where('customer_id',$data->customer_id)->get();
        // dd($branches);
        return view('inspection.edit_inspection')->with('data',$data)
                                                 ->with('customers',$customers)
                                                 ->with('branches',$branches)
                                                 ->with('years',$years);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $customer = Customer::where('id',$request->customber_id_text)->first();
        $branch = Branch::where('id',$request->branch_id_text)->first();

        $step01 = Starting::where('stage_id',$id)->first();
        if($request->Step1_inputGroupFile01_filename != null){
            $step01->meeting_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step1_inputGroupFile01_filename;
        }
        $step01->commitment_date = $request->commitment_date;
        if($request->Step1_inputGroupFile02_filename != null){
            $step01->organization_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step1_inputGroupFile02_filename;
        }
        $step01->save();

        $step02 = BoundarySetting::where('stage_id',$id)->first();
        $step02->standard = $request->standard;
        $step02->organizational_boundary_setting = $request->organizational_boundary_setting;
        $step02->boundary_setting = $request->boundary_setting;
        $step02->boundary_address = $request->address;
        $step02->reference_year = $request->year;
        $step02->save();

        $step03 = EmissionSourceIdentification::where('stage_id',$id)->first();
        if($request->Step3_inputGroupFile01_filename != null){
            $step03->activity_data_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step3_inputGroupFile01_filename;
        }
        $step03->photo_collection = null;
        $step03->save();

        $step04 = SystemCalculation::where('stage_id',$id)->first();
        if($request->Step4_inputGroupFile01_filename != null){
            $step04->emission_inventory_file_path = $customer->name.'_'.$branch->name.'_'.$request->Step4_inputGroupFile01_filename;
        }
        $step04->verification_unit_review = $request->verification_unit_review;
        $step04->verification_unit_review_date = $request->verification_unit_review_date;
        $step04->save();
        
        $step05 = AuditStorage::where('stage_id',$id)->first();
        $step05->internal_verification = $request->internal_verification;
        if($request->Step5_inputGroupFile01_filename != null){
            $step05->ares_international_certification_iso14064_1 = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile01_filename;
        }
        if($request->Step5_inputGroupFile02_filename != null){
            $step05->ares_international_certification_zero_carbon = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile02_filename;
        }
        if($request->Step5_inputGroupFile03_filename != null){
            $step05->un_carbon_certificate = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile03_filename;;
        }
        if($request->Step5_inputGroupFile04_filename != null){
            $step05->inventory_checklist = $customer->name.'_'.$branch->name.'_'.$request->Step5_inputGroupFile04_filename;;
        }
        $step05->save();

        return response()->json(['redirect_url' => route('inspection.edit', $id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
