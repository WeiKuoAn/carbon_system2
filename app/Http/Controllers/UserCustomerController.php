<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustData;
use App\Models\CustProject;
use Carbon\Carbon;
use App\Models\CustSocail;
use App\Models\ManufactureSubsidy;
use App\Models\ManufactureNorm;
use App\Models\ManufactureThreeIncome;
use App\Models\ManufactureAvoid;
use App\Models\ManufactureIso;
use Illuminate\Support\Facades\Auth;

class UserCustomerController extends Controller
{
    public function IntroduceEdit($id)
    {
        $years = [];
        $now = Carbon::now();

        for ($i = 1; $i <= 3; $i++) {
            $years[] = $now->copy()->subYears($i)->year;
        }
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->first();
        return view('admin-project.introduce-create')->with('project', $project)
                                                ->with('cust_data',$cust_data)
                                                ->with('years',$years);
    }

    public function IntroduceUpdate(Request $request,$id)
    {
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->first();
        // dd( $request->registration_no);
        //客戶資料
        $cust_data->introduce = $request->introduce;
        $cust_data->capital = $request->capital;
        $cust_data->county = $request->county;
        $cust_data->district = $request->district;
        $cust_data->zipcode = $request->zipcode;
        $cust_data->registration_no = $request->registration_no;
        $cust_data->address = $request->address;
        $cust_data->contact_name  = $request->main_contact_name;
        $cust_data->contact_job  = $request->main_contact_job;
        $cust_data->contact_email  = $request->main_contact_email;
        $cust_data->contact_phone  = $request->main_contact_phone;
        $cust_data->save();

        $project->last_year_revenue = $request->last_year_revenue;
        $project->Insured_employees = $request->Insured_employees;
        $project->insurance_male = $request->insurance_male;
        $project->insurance_female = $request->insurance_female;
        $project->insurance_total = $request->insurance_total;
        $project->clients_market = $request->clients_market;
        $project->export_status = $request->export_status;
        $project->contact_name  = $request->main_contact_name;
        $project->contact_job  = $request->main_contact_job;
        $project->contact_email  = $request->main_contact_email;
        $project->contact_phone  = $request->main_contact_phone;



        //是否做過碳盤查
        // dd($request->carbonCheck);
        if($request->carbonCheck == 1){
            $project->carbon_done  = $request->carbonCheck;
        }else{
            $project->carbon_done  = '0';
        }
        if($request->customCheck1 == 1){
            $project->subsidy  = $request->customCheck1;
        }else{
            $project->subsidy  = '0';
        }
        if($request->customCheck2 == 1){
            $project->avoid  = $request->customCheck2;
        }else{
            $project->avoid  = '0';
        }
        if($request->checkIso == 1){
            $project->carbon_iso  = $request->checkIso;
        }else{
            $project->carbon_iso  = '0';
        }
        $project->save();

        //是否申請過補助
        $cust_subsidy_datas = ManufactureSubsidy::where('project_id',$project->id)->get();
        if($request->customCheck1 == 1){
            if(count($cust_subsidy_datas) > 0) {
                $cust_subsidy_datas = ManufactureSubsidy::where('project_id',$project->id)->delete();
            }
            if(isset($request->subsidy_years))
            {
                foreach($request->subsidy_years as $key=>$subsidy_year)
                {
                    if(isset($subsidy_year))
                    {
                        $cust_subsidy = new ManufactureSubsidy;
                        $cust_subsidy->user_id = $id;
                        $cust_subsidy->project_id = $project->id;
                        $cust_subsidy->year = $request->subsidy_years[$key];
                        $cust_subsidy->name = $request->subsidy_names[$key];
                        $cust_subsidy->save();
                    }
                }
            }
        }else{
            if(count($cust_subsidy_datas) > 0) {
                $cust_subsidy_datas = ManufactureSubsidy::where('project_id',$project->id)->delete();
            }
        }

        //是否有須於審查階段迴避之人員
        $cust_avoid_data = ManufactureAvoid::where('project_id',$project->id)->first();
        if($request->customCheck1 == 1){
            if(isset($cust_avoid_data)) {
                $cust_avoid_data = ManufactureAvoid::where('project_id',$project->id)->delete();
            }
            if(isset($request->avoid_department))
            {
                $cust_avoid = new ManufactureAvoid;
                $cust_avoid->user_id = $id;
                $cust_avoid->project_id = $project->id;
                $cust_avoid->department = $request->avoid_department;
                $cust_avoid->job = $request->avoid_job;
                $cust_avoid->name = $request->avoid_name;
                $cust_avoid->save();
            }
        }else{
            if(isset($cust_avoid_data)) {
                $cust_avoid_data = ManufactureAvoid::where('project_id',$project->id)->delete();
            }
        }

        // 是否有已申請過的ISO或是目前正在申請的ISO資訊？
        $cust_iso_datas = ManufactureIso::where('project_id',$project->id)->get();
        if($request->checkIso == 1){
            if(count($cust_iso_datas) > 0) {
                $cust_iso_datas = ManufactureIso::where('project_id',$project->id)->delete();
            }
            if(isset($request->iso_names))
            {
                foreach($request->iso_names as $key=>$iso_name)
                {
                    if(isset($iso_name))
                    {
                        $cust_iso = new ManufactureIso;
                        $cust_iso->user_id = $id;
                        $cust_iso->project_id = $project->id;
                        $cust_iso->name = $request->iso_names[$key];
                        $cust_iso->year = $request->iso_years[$key];
                        $cust_iso->status = $request->iso_status[$key];
                        $cust_iso->save();
                    }
                }
            }
        }else{
            if(count($cust_iso_datas) > 0) {
                $cust_iso_datas = ManufactureIso::where('project_id',$project->id)->delete();
            }
        }

        $cust_socail_datas = CustSocail::where('project_id',$project->id)->get();
        // dd($cust_socail_datas);
        if(count($cust_socail_datas) > 0) {
            $cust_socail_datas = CustSocail::where('project_id',$project->id)->delete();
        }
        if(isset($request->socail_types))
        {
            foreach($request->socail_types as $key=>$socail_type)
            {
                if(isset($socail_type))
                {
                    $cust_socail = new CustSocail;
                    $cust_socail->user_id = $id;
                    $cust_socail->project_id = $project->id;
                    $cust_socail->type = $request->socail_types[$key];
                    $cust_socail->context = $request->socail_contexts[$key];
                    $cust_socail->save();
                }
            }
        }

        //營收
        $cust_income_datas = ManufactureThreeIncome::where('project_id',$project->id)->get();
        // dd($cust_income_datas);
        if(count($cust_income_datas) > 0) {
            $cust_income_datas = ManufactureThreeIncome::where('project_id',$project->id)->delete();
        }
        if(isset($request->three_incomes))
        {
            foreach($request->three_incomes as $key=>$three_income)
            {
                if(isset($three_income))
                {
                    $cust_income = new ManufactureThreeIncome;
                    $cust_income->user_id = $id;
                    $cust_income->project_id = $project->id;
                    $cust_income->income = $request->three_incomes[$key];
                    $cust_income->year = $request->three_years[$key];
                    $cust_income->save();
                }
            }
        }
        

        //指標客戶
        // dd($request->norm_contexts);
        $manufacture_norm_datas = ManufactureNorm::where('project_id',$project->id)->get();
        if(count($manufacture_norm_datas) > 0) {
            $manufacture_norm_datas = ManufactureNorm::where('project_id',$project->id)->delete();
        }
        if(isset($request->norm_names))
        {
            foreach($request->norm_names as $key=>$norm_name)
            {
                if(isset($norm_name))
                {
                    $manufacture_norm = new ManufactureNorm;
                    $manufacture_norm->user_id = $id;
                    $manufacture_norm->project_id = $project->id;
                    $manufacture_norm->name = $request->norm_names[$key];
                    $manufacture_norm->context= $request->norm_contexts[$key];
                    $manufacture_norm->save();
                }
            }
        }
        return redirect()->route('user.introduce.update',$id)->with('success', '客戶已成功新增');
    }


}