<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustProject;
use App\Models\CustSocail;
use App\Models\BusinessDrive;
use App\Models\BusinessNeed;
use App\Models\BusinessSituation;
use App\Models\CustData;
use App\Models\ProjectHost;
use App\Models\ProjectContact;
use App\Models\User;
use App\Models\ProjectPersonnel;
use App\Models\ManufactureNeed;
use App\Models\ManufactureExpected;
use App\Models\ManufactureImprove;
use App\Models\ManufactureSubsidy;
use App\Models\ManufactureNorm;
use App\Models\ProjectAppendix;
use Carbon\Carbon;
use App\Models\Word;
use App\Models\WordQuestion;
use App\Models\WordPlan;
use App\Models\WordPartner;
use App\Models\WordEffectiveness;
use App\Models\WordBenefit;
use App\Models\WordFund;
use App\Models\WordPlanned;
use App\Models\WordReductionItem;
use App\Models\WordCustomPerformance;
use App\Models\ManufactureThreeIncome;
use App\Models\ManufactureIso;
use App\Models\WordCheck;
use App\Models\WordServe;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor; // 確保引入正確的類別
use PhpOffice\PhpWord\Shared\Html;

class UserProjectController extends Controller
{
    public function index(Request $request,$id)
    {
        $datas = CustProject::where('user_id',$id)
                             ->where('status','0')
                             ->paginate(30);
        $cust_data = User::where('id',$id)->first();
        return view('admin-project.index')->with('datas', $datas)->with('cust_data',$cust_data);
    }

    public function BusinessCreate($id)
    {   
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type','0')->first();
        $project_host_data = ProjectHost::where('user_id',$id)->where('project_id',$project->id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->where('project_id',$project->id)->first();
        return view('admin-project.business-create')->with('project', $project)
                                              ->with('project_host_data',$project_host_data)
                                              ->with('project_contact_data',$project_contact_data)
                                              ->with('cust_data',$cust_data);
    }
    
    public function BusinessStore($id,Request $request)
    {   
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type','0')->first();
        

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
        
        //計畫主持人
        $project_host = ProjectHost::firstOrNew(['project_id' => $project->id]);
        $project_host->user_id = $id;
        $project_host->name = $request->host_name;
        $project_host->department = $request->host_department;
        $project_host->job = $request->host_job;
        $project_host->context = $request->host_context;
        $project_host->mobile = $request->host_mobile;
        $project_host->phone = $request->host_phone;
        $project_host->email = $request->host_email;
        $project_host->salary = $request->host_salary;
        $project_host->save();

        //計畫聯絡人
        $project_contact = ProjectContact::firstOrNew(['project_id' => $project->id]);
        $project_contact->user_id = $id;
        $project_contact->name = $request->contact_name;
        $project_contact->department = $request->contact_department;
        $project_contact->job = $request->contact_job;
        $project_contact->context = $request->contact_context;
        $project_contact->mobile = $request->contact_mobile;
        $project_contact->phone = $request->contact_phone;
        $project_contact->email = $request->contact_email;
        $project_contact->salary = $request->contact_salary;
        $project_contact->save();

        //人事名單
        $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->get();
        if(count($cust_personnel_datas) > 0) {
            $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->delete();
        }
        if(isset($request->personnel_names))
        {
            foreach($request->personnel_names as $key=>$personnel_name)
            {
                if(isset($personnel_name) && $personnel_name != null)
                {
                    $cust_personnel = new ProjectPersonnel;
                    $cust_personnel->user_id = $id;
                    $cust_personnel->project_id = $project->id;
                    $cust_personnel->name= $request->personnel_names[$key];
                    $cust_personnel->department = $request->personnel_departments[$key];
                    $cust_personnel->job = $request->personnel_jobs[$key];
                    $cust_personnel->context = $request->personnel_contexts[$key];
                    $cust_personnel->salary = $request->personnel_salarys[$key];
                    $cust_personnel->save();
                }
            }
        }

        //五家被帶動的企業
        $business_drive_datas = BusinessDrive::where('project_id',$project->id)->get();
        if(count($business_drive_datas) > 0) {
            $business_drive_datas = BusinessDrive::where('project_id',$project->id)->delete();
        }
        if(isset($request->drive_names))
        {
            foreach($request->drive_names as $key=>$drive_name)
            {
                if(isset($drive_name))
                {
                    $business_drive = new BusinessDrive;
                    $business_drive->user_id = $id;
                    $business_drive->project_id = $project->id;
                    $business_drive->type= $request->drive_types[$key];
                    $business_drive->name= $request->drive_names[$key];
                    $business_drive->numbers = $request->drive_numbers[$key];
                    $business_drive->principal = $request->drive_principals[$key];
                    $business_drive->employeecount = $request->drive_employeecounts[$key];
                    $business_drive->save();
                }
            }
        }

        //現況
        $business_situation_datas = BusinessSituation::where('project_id',$project->id)->get();
        if(count($business_situation_datas) > 0) {
            $business_situation_datas = BusinessSituation::where('project_id',$project->id)->delete();
        }
        if(isset($request->situation_contexts))
        {
            foreach($request->situation_contexts as $key=>$situation_context)
            {
                if(isset($situation_context))
                {
                    $business_situation = new BusinessSituation;
                    $business_situation->user_id = $id;
                    $business_situation->project_id = $project->id;
                    $business_situation->context= $request->situation_contexts[$key];
                    $business_situation->save();
                }
            }
        }

        //需求
        $business_need_datas = BusinessNeed::where('project_id',$project->id)->get();
        if(count($business_need_datas) > 0) {
            $business_need_datas = BusinessNeed::where('project_id',$project->id)->delete();
        }
        if(isset($request->need_names))
        {
            foreach($request->need_names as $key=>$need_name)
            {
                if(isset($need_name))
                {
                    $business_need = new BusinessNeed;
                    $business_need->user_id = $id;
                    $business_need->project_id = $project->id;
                    $business_need->name= $request->need_names[$key];
                    $business_need->context= $request->need_contexts[$key];
                    $business_need->save();
                }
            }
        }

        return redirect()->route('user.project.business.create',$id)->with('success', '客戶已成功新增');
    }

    public function BusinessAppendix($id)
    {
        $cust_data = CustData::where('user_id', $id)->first();
        $project = CustProject::where('user_id', $id)->first();
        $appendix = ProjectAppendix::where('project_id', $project->id)->first();

        $checkboxesStatus = $appendix ? json_encode($appendix->checkboxes_status) : json_encode([]);
        return view('admin-project.business-appendix',compact('cust_data', 'appendix', 'checkboxesStatus','project'));
    }

    public function BusinessPreview($id)
    {
        $years = [];
        $now = Carbon::now();

        for ($i = 1; $i <= 3; $i++) {
            $years[] = $now->copy()->subYears($i)->year;
        }
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type',0)->first();
        $project_host_data = ProjectHost::where('user_id',$id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->first();
        return view('admin-project.business-preview')->with('project', $project)
                                              ->with('project_host_data',$project_host_data)
                                              ->with('project_contact_data',$project_contact_data)
                                              ->with('cust_data',$cust_data)
                                              ->with('years',$years);
    }

    public function BusinessExportWord($id)
    {
        $years = [];
        $now = Carbon::now();

        for ($i = 1; $i <= 3; $i++) {
            $years[] = $now->copy()->subYears($i)->year;
        }
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type',0)->first();
        $project_host_data = ProjectHost::where('user_id',$id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->first();
        $word_data = Word::where('user_id',$id)->where('project_id',$project->id)->first();
        $user_data = User::where('id', $id)->first();
        $checks = ['導入智慧減碳應用服務','減少碳排放量','帶動企業家數（單一型免填）','帶動體驗人次'];
        return view('admin-project.business-export')->with('project', $project)
                                              ->with('project_host_data',$project_host_data)
                                              ->with('project_contact_data',$project_contact_data)
                                              ->with('cust_data',$cust_data)
                                              ->with('years',$years)
                                              ->with('word_data',$word_data)
                                              ->with('user_data',$user_data)
                                              ->with('checks',$checks);
    }

    public function BusinessSaveWord(Request $request , $id)
    {
        $user_data = User::where('id', $id)->first();
        $project = CustProject::where('user_id',$id)->where('type','0')->first();

        $cust_data = CustData::where('user_id',$id)->first();
        $cust_data->capital = $request->capital;
        $cust_data->county = $request->county;
        $cust_data->district = $request->district;
        $cust_data->zipcode = $request->zipcode;
        $cust_data->address = $request->address;
        $cust_data->factory_county = $request->factory_county;
        $cust_data->factory_district = $request->factory_district;
        $cust_data->factory_zipcode = $request->factory_zipcode;
        $cust_data->factory_address = $request->factory_address;
        $cust_data->registration_no = $request->registration_no;
        $cust_data->principal_name = $request->principal_name;
        $cust_data->introduce = $request->introduce;
        $cust_data->last_year_revenue = $request->last_year_revenue;
        $cust_data->Insured_employees = $request->Insured_employees;
        $cust_data->insurance_total = $request->insurance_total;
        $cust_data->clients_market = $request->clients_market;
        $cust_data->export_status = $request->export_status;
        $cust_data->contact_name  = $request->main_contact_name;
        $cust_data->contact_job  = $request->main_contact_job;
        $cust_data->contact_email  = $request->main_contact_email;
        $cust_data->contact_phone  = $request->main_contact_phone;
        $cust_data->receive_email  = $request->receive_email;
        $cust_data->receive_email_pwd  = $request->receive_email_pwd;
        $cust_data->save();

        //計劃書內容
        $word = Word::firstOrNew(['user_id' => $id,'project_id' => $project->id]);
        $word->user_id = $id;
        $word->project_id = $project->id;
        $word->introduction = $request->introduction;
        $word->mobile = $request->mobile;
        $word->fax = $request->fax;
        $word->website = $request->website;
        $word->mobile = $request->mobile;
        $word->fax = $request->fax;
        $word->principal_job = $request->principal_job;
        $word->principal_sex = $request->principal_sex;
        $word->startup = $request->startup;
        $word->business_activities = $request->business_activities;
        $word->industry_category = $request->industry_category;
        $word->create_date = $request->create_date;
        $word->project_name = $request->project_name;
        $word->project_start = $request->project_start;
        $word->project_end = $request->project_end;
        $word->total = $request->total;
        $word->subsidy = $request->subsidy;
        $word->self_funding = $request->self_funding;
        $word->project_summary = $request->project_summary;
        $word->partner = $request->partner;
        $word->face = $request->face;
        $word->growth_face = $request->growth_face;
        $word->organization_relationship = $request->organization_relationship;
        $word->application_solution = $request->application_solution;
        $word->checkpoint = $request->checkpoint;
        $word->save();
        
        //計畫導入前後服務情境
        $word_question_datas = WordQuestion::where('project_id',$project->id)->get();
        if(count($word_question_datas) > 0) {
            $word_question_datas = WordQuestion::where('project_id',$project->id)->delete();
        }
        if(isset($request->questions))
        {
            foreach($request->questions as $key=>$question)
            {
                if(isset($question))
                {
                    $word_question = new WordQuestion;
                    $word_question->user_id = $id;
                    $word_question->project_id = $project->id;
                    $word_question->question= $request->questions[$key];
                    $word_question->solution= $request->solutions[$key];
                    $word_question->illustrate = $request->illustrates[$key];
                    $word_question->save();
                }
            }
        }

        //智慧應用方案說明
        $word_plan_datas = WordPlan::where('project_id',$project->id)->get();
        if(count($word_plan_datas) > 0) {
            $word_plan_datas = WordPlan::where('project_id',$project->id)->delete();
        }
        if(isset($request->plan_name))
        {
            foreach($request->plan_name as $key=>$plan)
            {
                if(isset($plan))
                {
                    $word_plan = new WordPlan;
                    $word_plan->user_id = $id;
                    $word_plan->project_id = $project->id;
                    $word_plan->name= $request->plan_name[$key];
                    $word_plan->description= $request->plan_description[$key];
                    $word_plan->reduction_item = $request->plan_reduction_item[$key];
                    $word_plan->method = $request->plan_method[$key];
                    $word_plan->save();
                }
            }
        }

        //（一）執行成效
        $word_effectiveness_datas = WordEffectiveness::where('project_id',$project->id)->get();
        if(count($word_effectiveness_datas) > 0) {
            $word_effectiveness_datas = WordEffectiveness::where('project_id',$project->id)->delete();
        }
        if(isset($request->effectiveness_kpis))
        {
            foreach($request->effectiveness_kpis as $key=>$effectiveness_kpi)
            {
                if(isset($effectiveness_kpi))
                {
                    $word_effectiveness = new WordEffectiveness;
                    $word_effectiveness->user_id = $id;
                    $word_effectiveness->project_id = $project->id;
                    $word_effectiveness->kpi= $request->effectiveness_kpis[$key];
                    $word_effectiveness->goal= $request->effectiveness_goals[$key];
                    $word_effectiveness->definition = $request->effectiveness_definitions[$key];
                    $word_effectiveness->save();
                }
            }
        }

        //（二）減碳項目
        $word_reduction_datas = WordReductionItem::where('project_id',$project->id)->get();
        if(count($word_reduction_datas) > 0) {
            $word_reduction_datas = WordReductionItem::where('project_id',$project->id)->delete();
        }
        if(isset($request->reduction_item))
        {
            foreach($request->reduction_item as $key=>$reduction_item)
            {
                if(isset($reduction_item))
                {
                    $word_reduction = new WordReductionItem;
                    $word_reduction->user_id = $id;
                    $word_reduction->project_id = $project->id;
                    $word_reduction->item = $request->reduction_item[$key];
                    $word_reduction->before_guidance = $request->reduction_before_guidance[$key];
                    $word_reduction->after_guidance= $request->reduction_after_guidance[$key];
                    $word_reduction->difference= $request->reduction_difference[$key];
                    $word_reduction->relationship = $request->reduction_relationship[$key];
                    $word_reduction->save();
                }
            }
        }

        //自訂績效指標
        $word_custom_datas = WordCustomPerformance::where('project_id',$project->id)->get();
        if(count($word_custom_datas) > 0) {
            $word_custom_datas = WordCustomPerformance::where('project_id',$project->id)->delete();
        }
        if(isset($request->custom_performance))
        {
            foreach($request->custom_performance as $key=>$custom_performance)
            {
                if(isset($custom_performance))
                {
                    $word_custom = new WordCustomPerformance;
                    $word_custom->user_id = $id;
                    $word_custom->project_id = $project->id;
                    $word_custom->performance = $request->custom_performance[$key];
                    $word_custom->before_guidance = $request->custom_before_guidance[$key];
                    $word_custom->after_guidance= $request->custom_after_guidance[$key];
                    $word_custom->explanation= $request->custom_explanation[$key];
                    $word_custom->save();
                }
            }
        }

        //查核點
        $word_serve_datas = WordServe::where('project_id',$project->id)->get();
        if(count($word_serve_datas) > 0) {
            $word_serve_datas = WordServe::where('project_id',$project->id)->delete();
        }
        if(isset($request->serve_item))
        {
            foreach($request->serve_item as $key=>$serve_item)
            {
                if(isset($serve_item))
                {
                    $word_serve = new WordServe;
                    $word_serve->user_id = $id;
                    $word_serve->project_id = $project->id;
                    $word_serve->item = $request->serve_item[$key];
                    $word_serve->context = $request->serve_context[$key];
                    $word_serve->save();
                }
            }
        }

        //其他效益WordBenefit
        $word_benefit_datas = WordBenefit::where('project_id',$project->id)->get();
        if(count($word_benefit_datas) > 0) {
            $word_benefit_datas = WordBenefit::where('project_id',$project->id)->delete();
        }
        if(isset($request->benefit_item))
        {
            foreach($request->benefit_item as $key=>$benefit_item)
            {
                if(isset($benefit_item))
                {
                    $word_benefit = new WordBenefit;
                    $word_benefit->user_id = $id;
                    $word_benefit->project_id = $project->id;
                    $word_benefit->item = $request->benefit_item[$key];
                    $word_benefit->benefit = $request->benefit_benefit[$key];
                    $word_benefit->save();
                }
            }
        }

        //預定進度
        $word_planned_datas = WordPlanned::where('project_id',$project->id)->get();
        if(count($word_planned_datas) > 0) {
            $word_planned_datas = WordPlanned::where('project_id',$project->id)->delete();
        }
        if(isset($request->planned_item))
        {
            foreach($request->planned_item as $key=>$planned_item)
            {
                if(isset($planned_item))
                {
                    $word_planned = new WordPlanned;
                    $word_planned->user_id = $id;
                    $word_planned->project_id = $project->id;
                    $word_planned->item= $request->planned_item[$key];
                    $word_planned->save();
                }
            }
        }

        //預定查核點
        $word_check_datas = WordCheck::where('project_id',$project->id)->get();
        if(count($word_check_datas) > 0) {
            $word_check_datas = WordCheck::where('project_id',$project->id)->delete();
        }
        if(isset($request->check_item))
        {
            foreach($request->check_item as $key=>$check_item)
            {
                if(isset($check_item))
                {
                    $word_check = new WordCheck;
                    $word_check->user_id = $id;
                    $word_check->project_id = $project->id;
                    $word_check->item= $request->check_item[$key];
                    $word_check->estimated= $request->check_estimated[$key];
                    $word_check->midterm_checkpoint= $request->check_midterm_checkpoint[$key];
                    $word_check->final_checkpoint= $request->check_final_checkpoint[$key];
                    $word_check->proportion= $request->check_proportion[$key];
                    $word_check->audit_data= $request->check_audit_data[$key];
                    $word_check->save();
                }
            }
        }

        //經費規劃表
        $word_fund = WordFund::firstOrNew(['user_id' => $id,'project_id' => $project->id]);
        $word_fund->user_id = $id;
        $word_fund->project_id = $project->id;
        for ($i = 1; $i <= 46; $i++) {
            $field = 'fund_' . $i;
            $word_fund->$field = $request->$field;
        }
        $word_fund->context = $request->fund_context;
        $word_fund->save();
        

        
        //計畫主持人
        $project_host = ProjectHost::firstOrNew(['project_id' => $project->id]);
        $project_host->user_id = $id;
        $project_host->name = $request->host_name;
        $project_host->department = $request->host_department;
        $project_host->job = $request->host_job;
        $project_host->context = $request->host_context;
        $project_host->mobile = $request->host_mobile;
        $project_host->phone = $request->host_phone;
        $project_host->email = $request->host_email;
        $project_host->salary = $request->host_salary;
        $project_host->month = $request->host_month;
        $project_host->save();

        //計畫聯絡人
        $project_contact = ProjectContact::firstOrNew(['project_id' => $project->id]);
        $project_contact->user_id = $id;
        $project_contact->name = $request->contact_name;
        $project_contact->department = $request->contact_department;
        $project_contact->job = $request->contact_job;
        $project_contact->context = $request->contact_context;
        $project_contact->mobile = $request->contact_mobile;
        $project_contact->phone = $request->contact_phone;
        $project_contact->email = $request->contact_email;
        $project_contact->salary = $request->contact_salary;
        $project_contact->month = $request->contact_month;
        $project_contact->save();

        //人事名單
        $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->get();
        if(count($cust_personnel_datas) > 0) {
            $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->delete();
        }
        if(isset($request->personnel_names))
        {
            foreach($request->personnel_names as $key=>$personnel_name)
            {
                if(isset($personnel_name) && $personnel_name != null)
                {
                    $cust_personnel = new ProjectPersonnel;
                    $cust_personnel->user_id = $id;
                    $cust_personnel->project_id = $project->id;
                    $cust_personnel->name= $request->personnel_names[$key];
                    $cust_personnel->department = $request->personnel_departments[$key];
                    $cust_personnel->job = $request->personnel_jobs[$key];
                    $cust_personnel->context = $request->personnel_contexts[$key];
                    $cust_personnel->salary = $request->personnel_salarys[$key];
                    $cust_personnel->month = $request->personnel_months[$key];
                    $cust_personnel->save();
                }
            }
        }

        //資服業者
        $cust_partner_datas = WordPartner::where('project_id',$project->id)->get();
        if(count($cust_partner_datas) > 0) {
            $cust_partner_datas = WordPartner::where('project_id',$project->id)->delete();
        }
        if(isset($request->partner_names))
        {
            foreach($request->partner_names as $key=>$partner_name)
            {
                if(isset($partner_name) && $partner_name != null)
                {
                    $cust_partner = new WordPartner;
                    $cust_partner->user_id = $id;
                    $cust_partner->project_id = $project->id;
                    $cust_partner->name= $request->partner_names[$key];
                    $cust_partner->job_content = $request->partner_jobs[$key];
                    $cust_partner->save();
                }
            }
        }

        //五家被帶動的企業
        $business_drive_datas = BusinessDrive::where('project_id',$project->id)->get();
        if(count($business_drive_datas) > 0) {
            $business_drive_datas = BusinessDrive::where('project_id',$project->id)->delete();
        }
        if(isset($request->drive_names))
        {
            foreach($request->drive_names as $key=>$drive_name)
            {
                if(isset($drive_name))
                {
                    $business_drive = new BusinessDrive;
                    $business_drive->user_id = $id;
                    $business_drive->project_id = $project->id;
                    $business_drive->type= $request->drive_types[$key];
                    $business_drive->name= $request->drive_names[$key];
                    $business_drive->numbers = $request->drive_numbers[$key];
                    $business_drive->principal = $request->drive_principals[$key];
                    $business_drive->employeecount = $request->drive_employeecounts[$key];
                    $business_drive->brand_name = $request->drive_brand_names[$key];
                    $business_drive->industry = $request->drive_industrys[$key];
                    $business_drive->city = $request->drive_citys[$key];
                    $business_drive->save();
                }
            }
        }

        //現況
        $business_situation_datas = BusinessSituation::where('project_id',$project->id)->get();
        if(count($business_situation_datas) > 0) {
            $business_situation_datas = BusinessSituation::where('project_id',$project->id)->delete();
        }
        if(isset($request->situation_contexts))
        {
            foreach($request->situation_contexts as $key=>$situation_context)
            {
                if(isset($situation_context))
                {
                    $business_situation = new BusinessSituation;
                    $business_situation->user_id = $id;
                    $business_situation->project_id = $project->id;
                    $business_situation->context= $request->situation_contexts[$key];
                    $business_situation->save();
                }
            }
        }

        //需求
        $business_need_datas = BusinessNeed::where('project_id',$project->id)->get();
        if(count($business_need_datas) > 0) {
            $business_need_datas = BusinessNeed::where('project_id',$project->id)->delete();
        }
        if(isset($request->need_names))
        {
            foreach($request->need_names as $key=>$need_name)
            {
                if(isset($need_name))
                {
                    $business_need = new BusinessNeed;
                    $business_need->user_id = $id;
                    $business_need->project_id = $project->id;
                    $business_need->name= $request->need_names[$key];
                    $business_need->context= $request->need_contexts[$key];
                    $business_need->save();
                }
            }
        }
        return redirect()->route('business-export-word',$id)->with('success', '客戶已成功新增');
    }

    //匯出word
    public function exportWord($id)
    {
        // 加載 Word 模板
        $templateProcessor = new TemplateProcessor(public_path('docx/公版-商業服務業計畫書.docx'));

        // 獲取客戶資料
        $user_data = User::where('id', $id)->first();
        $cust_data = CustData::where('user_id', $id)->first();
        $project = CustProject::where('user_id',$id)->where('type',0)->first();
        $word_data = Word::where('user_id', $id)->first();
        $word_questions = WordQuestion::where('user_id', $id)->where('project_id',$project->id)->get();
        $project_host_data = ProjectHost::where('user_id',$id)->where('project_id',$project->id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->where('project_id',$project->id)->first();
        
        
        // 確保 $cust_data 存在
        if (!$cust_data) {
            return response()->json(['error' => '客戶資料未找到'], 404);
        }

        //part0.封面
        $templateProcessor->setValue('home_project_name', $word_data->project_name ?? ' '); // 計畫名稱
        $templateProcessor->setValue('home_name', $user_data->name ?? ' '); // 公司名稱
        // part1.提案企業資料
        $templateProcessor->setValue('name', $user_data->name ?? ' '); // 公司名稱
        $templateProcessor->setValue('registration_no', $cust_data->registration_no ?? ' '); // 統編
        $templateProcessor->setValue('principal_name', $cust_data->principal_name ?? ' '); // 公司負責人
        $templateProcessor->setValue('last_year_revenue', number_format($cust_data->last_year_revenue ?? 0)); // 前一年營收
        $templateProcessor->setValue('address', ($cust_data->county ?? '') . ($cust_data->district ?? '') . ($cust_data->address ?? ' ')); // 聯絡地址
        $templateProcessor->setValue('insurance_total', $cust_data->insurance_total ?? ' '); // 員工人數
        $templateProcessor->setValue('mobile', $word_data->mobile ?? ' '); // 手機
        $templateProcessor->setValue('fax', $word_data->fax ?? ' '); // 傳真
        $templateProcessor->setValue('website', $word_data->website ?? ' '); // 網站
        $templateProcessor->setValue('principal_job', $word_data->principal_job ?? ' '); // 負責人職位
        $templateProcessor->setValue('principal_sex', $word_data->principal_sex ?? ' '); // 負責人性別
        $templateProcessor->setValue('startup', $word_data->startup ?? ' '); // 是否為新創
        $templateProcessor->setValue('business_activities', $word_data->business_activities ?? ' '); // 主要營業項目
        $templateProcessor->setValue('industry_category', $word_data->industry_category ?? ' '); // 產業領域
        $templateProcessor->setValue('create_date', $word_data->create_date ?? ' '); // 核准設立日期

        // part2.計畫綱要
        $project_start = $word_data->project_start ?? ' ';
        $project_end = $word_data->project_end ?? ' ';
        $roc_project_start = $this->convertToRocDate($project_start);
        $roc_project_end = $this->convertToRocDate($project_end);

        $templateProcessor->setValue('project_name', $word_data->project_name ?? ' '); // 計畫名稱
        $templateProcessor->setValue('project_start', $roc_project_start ?? ' '); // 計畫開始日期
        $templateProcessor->setValue('project_end', $roc_project_end ?? ' '); // 計畫結束日期
        $templateProcessor->setValue('total', number_format($word_data->total ?? 0)); // 總經費
        $templateProcessor->setValue('subsidy', number_format($word_data->subsidy ?? 0)); // 補助款
        $templateProcessor->setValue('self_funding', number_format($word_data->self_funding ?? 0)); // 自籌款
        $templateProcessor->setValue('partner', $word_data->partner ?? ' '); // 合作單位
        $templateProcessor->setValue('project_host_name', $project_host_data->name ?? ' '); // 計畫主持人
        $templateProcessor->setValue('project_host_department', $project_host_data->department ?? ' ');
        $templateProcessor->setValue('project_host_job', $project_host_data->job ?? ' ');
        $templateProcessor->setValue('project_host_mobile', $project_host_data->mobile ?? ' ');
        $templateProcessor->setValue('project_host_phone', $project_host_data->phone ?? ' ');
        $templateProcessor->setValue('project_host_email', $project_host_data->email ?? ' ');
        $templateProcessor->setValue('project_contact_name', $project_contact_data->name ?? ' '); // 計畫聯絡人
        $templateProcessor->setValue('project_contact_department', $project_contact_data->department ?? ' ');
        $templateProcessor->setValue('project_contact_job', $project_contact_data->job ?? ' ');
        $templateProcessor->setValue('project_contact_mobile', $project_contact_data->mobile ?? ' ');
        $templateProcessor->setValue('project_contact_phone', $project_contact_data->phone ?? ' ');
        $templateProcessor->setValue('project_contact_email', $project_contact_data->email ?? ' ');
        

        // CKEditor 的 HTML 內容
        $introduction = $word_data->introduction ?? ' ';
        $project_summary = $word_data->project_summary ?? ' ';
        $face = $word_data->face ?? ' ';
        $growth_face = $word_data->growth_face ?? ' ';
        $organization_relationship = $word_data->organization_relationship ?? ' ';
        $application_solution = $word_data->application_solution ?? ' ';

        // 將多個內容變數放入一個陣列
        $contentArray = [$introduction, $project_summary, $face, $growth_face, $organization_relationship, $application_solution];

        // 初始化一個空陣列來存放處理後的內容
        $textContents = [];
        foreach ($contentArray as $content) {
            // 使用空白行進行斷行處理，將兩個換行符轉換為 Word 中的換行符
            $processedContent = str_replace("\n\n", '</w:t><w:br/><w:t>', $content);
            // 將單一換行符轉換為 Word 中的換行符
            $processedContent = str_replace("\n", '</w:t><w:br/><w:t>', $processedContent);
            // 將處理後的內容加入結果陣列中
            $textContents[] = $processedContent;
        }

        // 将处理后的内容填充到 Word 模板中，即使内容为空，也会显示  
        $templateProcessor->setValue('introduction', $textContents[0]);// 公司基本介紹
        $templateProcessor->setValue('project_summary', $textContents[1]);// 計畫摘要
        $templateProcessor->setValue('face', $textContents[2]);// 企業面臨問題
        $templateProcessor->setValue('growth_face', $textContents[3]);// 待精進/成長之面向


        //part4人事與拜帶動企業
        
        $templateProcessor->setValue('drive.application_solution', $textContents[5]);//待精進/成長之面向


         // 動態生成表格行
         $templateProcessor->cloneRow('question.id', count($word_questions));
         foreach ($word_questions as $key => $word_question) {
            $rowIndex = $key + 1;
            
            // 處理問題的換行符號
            $question = nl2br($word_question['question']); // 將換行符號轉換為 <br /> 標籤
            $question = str_replace("<br />", '<w:br/>', $question?? ' '); // 將 <br /> 轉換為 Word 的換行符號
        
            // 處理說明的換行符號
            $illustrate = nl2br($word_question['illustrate']); // 將換行符號轉換為 <br /> 標籤
            $illustrate = str_replace("<br />", '<w:br/>', $illustrate?? ' '); // 將 <br /> 轉換為 Word 的換行符號
            
            // 將每一個問題的對應數據填充到模板中
            $templateProcessor->setValue("question.id#{$rowIndex}", $rowIndex?? ' '); // 動態生成行號
            $templateProcessor->setValue("question.question#{$rowIndex}", $question?? ' '); // 問題
            $templateProcessor->setValue("question.solution_id#{$rowIndex}", $rowIndex?? ' '); // 動態生成解決方案 ID
            $templateProcessor->setValue("question.solution#{$rowIndex}", $word_question['solution']?? ' '); // 解決方案
            $templateProcessor->setValue("question.illustrate#{$rowIndex}", $illustrate?? ' '); // 處理過的說明
            $templateProcessor->setValue("question.solution_img#{$rowIndex}", $word_question['solution']?? ' '); // 解決方案圖片
        }

        $word_plans = WordPlan::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('plan.name', count($word_plans));

        foreach ($word_plans as $key => $word_plan) {
           $rowIndex = $key + 1;
           // 處理問題的換行符號
           $plan_name = nl2br($word_plan['name']?? ' '); 
           $plan_name = str_replace("<br />", '<w:br/>', $plan_name?? ' ');
           $plan_description = nl2br($word_plan['description']?? ' '); 
           $plan_description = str_replace("<br />", '<w:br/>', $plan_description?? ' ');
           $plan_reduction_item = nl2br($word_plan['reduction_item']?? ' '); 
           $plan_reduction_item = str_replace("<br />", '<w:br/>', $plan_reduction_item?? ' ');
           
           // 將每一個問題的對應數據填充到模板中
           $templateProcessor->setValue("plan.name#{$rowIndex}", $plan_name?? ' '); // 動態生成行號
           $templateProcessor->setValue("plan.description#{$rowIndex}", $plan_description?? ' '); // 問題
           $templateProcessor->setValue("plan.reduction_item#{$rowIndex}", $plan_reduction_item?? ' '); // 動態生成解決方案 ID
           $templateProcessor->setValue("plan.method#{$rowIndex}", $word_plan['method']?? ' '); // 解決方案
       }

       $drive_datas = BusinessDrive::where('user_id', $id)->where('project_id', $project->id)->get();
        $templateProcessor->cloneRow('drive.name', count($drive_datas));
        foreach ($drive_datas as $key => $drive_data) {
            $rowIndex = $key + 1;
            $type = '';
            if($drive_data->type == '0'){
                $type = "上游";
            } else if($drive_data->type == '1'){
                $type = "下游";
            } else {
                $type = "合作";
            }
            $templateProcessor->setValue("drive.name#{$rowIndex}", $drive_data['name'] ?? '');
            $templateProcessor->setValue("drive.organization_relationship#{$rowIndex}", "主提案商之" . ($type ?? ''));//企业面临问题
        }

        $templateProcessor->cloneRow('drive.name_list', count($drive_datas));
        foreach ($drive_datas as $key => $drive_data) {
            $rowIndex = $key + 1;
            $templateProcessor->setValue("drive.name_list#{$rowIndex}", $drive_data['name'] ?? '');
            $templateProcessor->setValue("drive.brand_name#{$rowIndex}", $drive_data['brand_name'] ?? '');
            $templateProcessor->setValue("drive.principal#{$rowIndex}", $drive_data['principal'] ?? '');
            $templateProcessor->setValue("drive.industry#{$rowIndex}", $drive_data['industry'] ?? '');
            $templateProcessor->setValue("drive.city#{$rowIndex}", $drive_data['city'] ?? '');
            $templateProcessor->setValue("drive.employeecount#{$rowIndex}", $drive_data['employeecount'] ?? '');
            $templateProcessor->setValue("drive.numbers#{$rowIndex}", $drive_data['numbers'] ?? '');
        }

        // part4.人事
        $templateProcessor->setValue('company_name', $user_data->name ?? ''); 
        $templateProcessor->setValue('host_name', $project_host_data->name ?? ''); 
        $templateProcessor->setValue('host_job', $project_host_data->job ?? '');  
        $templateProcessor->setValue('host_month', $project_host_data->month ?? '');  
        $templateProcessor->setValue('contact_name', $project_contact_data->name ?? ''); 
        $templateProcessor->setValue('contact_job', $project_contact_data->job ?? ''); 
        $templateProcessor->setValue('contact_month', $project_contact_data->month ?? '');  

        $personnel_datas = ProjectPersonnel::where('project_id', $project->id)->get();
        $templateProcessor->cloneRow('personnel_name', count($personnel_datas));
        foreach ($personnel_datas as $key => $personnel_data) {
            $rowIndex = $key + 1;
            $templateProcessor->setValue("personnel_name#{$rowIndex}", $personnel_data['name'] ?? '');
            $templateProcessor->setValue("personnel_job#{$rowIndex}", $personnel_data['job'] ?? '');
            $templateProcessor->setValue("personnel_month#{$rowIndex}", $personnel_data['month'] ?? '');
        }

        $partner_datas = WordPartner::where('project_id', $project->id)->get();
        $templateProcessor->cloneRow('partner_name', count($partner_datas));
        foreach ($partner_datas as $key => $partner_data) {
            $rowIndex = $key + 1;
            $templateProcessor->setValue("partner_name#{$rowIndex}", $partner_data['name'] ?? '');
            $templateProcessor->setValue("partner_job_content#{$rowIndex}", $partner_data['job_content'] ?? '');
        }

        // 查核點
        $serve_datas = WordServe::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('serve_item', count($serve_datas));
        foreach ($serve_datas as $key => $serve_datas) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $item = nl2br($serve_datas['item']); 
            $item = str_replace("<br />", '<w:br/>', $item);
            $context = nl2br($serve_datas['context']); 
            $context = str_replace("<br />", '<w:br/>', $context);
            $templateProcessor->setValue("serve_item#{$rowIndex}", $item ?? '' );
            $templateProcessor->setValue("serve_context#{$rowIndex}", $context  ?? '');
        }


        // part5
        $effectiveness_datas = WordEffectiveness::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('effectiveness_kpi', count($effectiveness_datas));
        foreach ($effectiveness_datas as $key => $effectiveness_data) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $kpi = nl2br($effectiveness_data['kpi']); 
            $kpi = str_replace("<br />", '<w:br/>', $kpi);
            $goal = nl2br($effectiveness_data['goal']); 
            $goal = str_replace("<br />", '<w:br/>', $goal);
            $definition = nl2br($effectiveness_data['definition']); 
            $definition = str_replace("<br />", '<w:br/>', $definition ?? '');   
            $templateProcessor->setValue("effectiveness_kpi#{$rowIndex}", $kpi ?? '');
            $templateProcessor->setValue("effectiveness_goal#{$rowIndex}", $goal ?? '');
            $templateProcessor->setValue("effectiveness_definition#{$rowIndex}", $definition ?? '');
        }

        $reduction_datas = WordReductionItem::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('reduction_item', count($effectiveness_datas));
        foreach ($reduction_datas as $key => $reduction_data) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $item = nl2br($reduction_data['item']); 
            $item = str_replace("<br />", '<w:br/>', $item);
            $before_guidance = nl2br($reduction_data['before_guidance']); 
            $before_guidance = str_replace("<br />", '<w:br/>', $before_guidance);
            $after_guidance = nl2br($reduction_data['after_guidance']); 
            $after_guidance = str_replace("<br />", '<w:br/>', $after_guidance);  
            $difference = nl2br($reduction_data['difference']);
            $difference = str_replace("<br />", '<w:br/>', $difference);  
            $relationship = nl2br($reduction_data['relationship']);     
            $relationship = str_replace("<br />", '<w:br/>', $relationship);   
            $templateProcessor->setValue("reduction_item#{$rowIndex}", $item ?? '');
            $templateProcessor->setValue("reduction_before_guidance#{$rowIndex}", $before_guidance ?? '');
            $templateProcessor->setValue("reduction_after_guidance#{$rowIndex}", $after_guidance ?? '');
            $templateProcessor->setValue("reduction_difference#{$rowIndex}", $difference ?? '');
            $templateProcessor->setValue("reduction_relationship#{$rowIndex}", $relationship ?? '');
        }

        $custom_datas = WordCustomPerformance::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('custom_performance', count($custom_datas));
        foreach ($custom_datas as $key => $custom_datas) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $performance = nl2br($custom_datas['performance']); 
            $performance = str_replace("<br />", '<w:br/>', $performance);
            $before_guidance = nl2br($custom_datas['before_guidance']); 
            $before_guidance = str_replace("<br />", '<w:br/>', $before_guidance);
            $after_guidance = nl2br($custom_datas['after_guidance']); 
            $after_guidance = str_replace("<br />", '<w:br/>', $after_guidance);  
            $explanation = nl2br($custom_datas['explanation']);
            $explanation = str_replace("<br />", '<w:br/>', $explanation);  
            $relationship = nl2br($custom_datas['relationship']);     
            $relationship = str_replace("<br />", '<w:br/>', $relationship);   
            $templateProcessor->setValue("custom_performance#{$rowIndex}", $performance ?? '' );
            $templateProcessor->setValue("custom_before_guidance#{$rowIndex}", $before_guidance  ?? '');
            $templateProcessor->setValue("custom_after_guidance#{$rowIndex}", $after_guidance  ?? '');
            $templateProcessor->setValue("custom_explanation#{$rowIndex}", $explanation  ?? '');
        }

        $benefit_datas = WordBenefit::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('benefit_item', count($benefit_datas));
        foreach ($benefit_datas as $key => $benefit_datas) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $item = nl2br($benefit_datas['item']); 
            $item = str_replace("<br />", '<w:br/>', $item);
            $benefit = nl2br($benefit_datas['benefit']); 
            $benefit = str_replace("<br />", '<w:br/>', $benefit);
            $templateProcessor->setValue("benefit_item#{$rowIndex}", $item ?? '' );
            $templateProcessor->setValue("benefit_benefit#{$rowIndex}", $benefit  ?? '');
        }

        $word_fund = WordFund::where('user_id', $id)->where('project_id', $project->id)->first();
        for ($i = 1; $i <= 46; $i++) {
            $field = 'fund_' . $i;
            $value = $word_fund->$field;

            // 如果值为 null 或者空字串，或者确实为 0，都强制设置为 "0"
            if ($value === null || $value === '' || $value == 0) {
                $value = "0";
            }

            // 直接设置为字符串
            $templateProcessor->setValue("fund_$i", $value ?? '');
        }
        // ?? ' '處理 context 的換行符
        $fund_context = nl2br($word_fund['context']); 
        $fund_context = str_replace("<br />", '<w:br/>', $fund_context);
        $templateProcessor->setValue('fund_context', $fund_context ?? '');

        $planned_datas = WordPlanned::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('planned_item', count($planned_datas));
        foreach ($planned_datas as $key => $planned_data) {
            $rowIndex = $key + 1;
            // 將每一個問題的對應數據填充到模板中
            $templateProcessor->setValue("planned_item#{$rowIndex}",$planned_data['item'] ?? '');
        }

        $templateProcessor->setValue("checkpoint", $word_data->checkpoint  ?? '');
        
        $check_datas = WordCheck::where('user_id', $id)->where('project_id',$project->id)->get();
        $templateProcessor->cloneRow('check_item', count($check_datas));
        foreach ($check_datas as $key => $check_data) {
            $rowIndex = $key + 1;
            // 處理 item 的換行符和 & 符號
            $item = $check_data['item'] ?? '';
            $item = nl2br($item); 
            $item = str_replace(array("<br />", "<br>"), "\r\n", $item);
            $item = str_replace("&", "&amp;", $item); // 將 & 符號替換為 &amp;

            // 處理 audit_data 的換行符和 & 符號
            $audit_data = $check_data['audit_data'] ?? '';
            $audit_data = nl2br($audit_data); 
            $audit_data = str_replace(array("<br />", "<br>"), "\r\n", $audit_data);
            $audit_data = str_replace("&", "&amp;", $audit_data); // 將 & 符號替換為 &amp;
            $templateProcessor->setValue("check_item#{$rowIndex}", $item ?? '');
            $templateProcessor->setValue("check_estimated#{$rowIndex}",$check_data['estimated']  ?? '');
            $templateProcessor->setValue("check_midterm_checkpoint#{$rowIndex}",$check_data['midterm_checkpoint']  ?? '');
            $templateProcessor->setValue("check_final_checkpoint#{$rowIndex}",$check_data['final_checkpoint']  ?? '');
            $templateProcessor->setValue("check_proportion#{$rowIndex}",$check_data['proportion']  ?? '');
            $templateProcessor->setValue("check_audit_data#{$rowIndex}",$audit_data  ?? '');
        }



        

        


        // 保存修改後的文件到臨時路徑
        $fileName = $user_data->name.'-商業服務業計畫書' . '.docx';
        $tempFilePath = tempnam(sys_get_temp_dir(), 'phpword') . '.docx';
        $templateProcessor->saveAs($tempFilePath);

        // 將文件作為下載返回，並在傳送後刪除臨時文件
        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }


    public function ManufacturingPreview($id)
    {
        $years = [];
        $now = Carbon::now();

        for ($i = 1; $i <= 3; $i++) {
            $years[] = $now->copy()->subYears($i)->year;
        }
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type',1)->first();
        $project_host_data = ProjectHost::where('user_id',$id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->first();
        return view('admin-project.manufacturing-preview')->with('project', $project)
                                                          ->with('project_host_data',$project_host_data)
                                                           ->with('project_contact_data',$project_contact_data)
                                                           ->with('cust_data',$cust_data)
                                                           ->with('years',$years);
    }

    public function ManufacturingAppendix($id)
    {
        $cust_data = CustData::where('user_id', $id)->first();
        $project = CustProject::where('user_id', $id)->first();
        $appendix = ProjectAppendix::where('project_id', $project->id)->first();

        $checkboxesStatus = $appendix ? json_encode($appendix->checkboxes_status) : json_encode([]);
        return view('admin-project.manufacturing-appendix',compact('cust_data', 'appendix', 'checkboxesStatus','project'));
    }

    public function ManufacturingCreate($id,)
    {
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type','1')->first();
        $project_host_data = ProjectHost::where('user_id',$id)->where('project_id',$project->id)->first();
        $project_contact_data = ProjectContact::where('user_id',$id)->where('project_id',$project->id)->first();

        return view('admin-project.manufacturing-create')->with('project', $project)
                                                    ->with('project_host_data',$project_host_data)
                                                    ->with('project_contact_data',$project_contact_data)
                                                    ->with('cust_data',$cust_data);;
    }

    public function ManufacturingStore($id,Request $request)
    {   
        $cust_data = CustData::where('user_id',$id)->first();
        $project = CustProject::where('user_id',$id)->where('type','1')->first();
        

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
        
        //計畫主持人
        $project_host = ProjectHost::firstOrNew(['project_id' => $project->id]);
        $project_host->user_id = $id;
        $project_host->name = $request->host_name;
        $project_host->department = $request->host_department;
        $project_host->job = $request->host_job;
        $project_host->context = $request->host_context;
        $project_host->mobile = $request->host_mobile;
        $project_host->phone = $request->host_phone;
        $project_host->experience = $request->host_experience;
        $project_host->past_experience = $request->host_past_experience;
        $project_host->email = $request->host_email;
        $project_host->salary = $request->host_salary;
        $project_host->save();

        //計畫聯絡人
        $project_contact = ProjectContact::firstOrNew(['project_id' => $project->id]);
        $project_contact->user_id = $id;
        $project_contact->name = $request->contact_name;
        $project_contact->department = $request->contact_department;
        $project_contact->job = $request->contact_job;
        $project_contact->context = $request->contact_context;
        $project_contact->mobile = $request->contact_mobile;
        $project_contact->phone = $request->contact_phone;
        $project_contact->experience = $request->contact_experience;
        $project_contact->past_experience = $request->contact_past_experience;
        $project_contact->email = $request->contact_email;
        $project_contact->salary = $request->contact_salary;
        $project_contact->save();

        //人事名單
        $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->get();
        if(count($cust_personnel_datas) > 0) {
            $cust_personnel_datas = ProjectPersonnel::where('project_id',$project->id)->delete();
        }
        if(isset($request->personnel_names))
        {
            foreach($request->personnel_names as $key=>$personnel_name)
            {
                if(isset($personnel_name) && $personnel_name != null)
                {
                    $cust_personnel = new ProjectPersonnel;
                    $cust_personnel->user_id = $id;
                    $cust_personnel->project_id = $project->id;
                    $cust_personnel->name= $request->personnel_names[$key];
                    $cust_personnel->department = $request->personnel_departments[$key];
                    $cust_personnel->job = $request->personnel_jobs[$key];
                    $cust_personnel->context = $request->personnel_contexts[$key];
                    $cust_personnel->experience = $request->personnel_experiences[$key];
                    $cust_personnel->past_experience = $request->personnel_past_experiences[$key];
                    $cust_personnel->salary = $request->personnel_salarys[$key];
                    $cust_personnel->save();
                }
            }
        }

        //指標客戶
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
                    $manufacture_norm->context= $request->need_contexts[$key];
                    $manufacture_norm->save();
                }
            }
        }



        //需求
        $manufacture_need_datas = ManufactureNeed::where('project_id',$project->id)->get();
        if(count($manufacture_need_datas) > 0) {
            $manufacture_need_datas = ManufactureNeed::where('project_id',$project->id)->delete();
        }
        if(isset($request->need_contexts))
        {
            foreach($request->need_contexts as $key=>$need_context)
            {
                if(isset($need_context))
                {
                    $manufacture_need = new ManufactureNeed;
                    $manufacture_need->user_id = $id;
                    $manufacture_need->project_id = $project->id;
                    $manufacture_need->context= $request->need_contexts[$key];
                    $manufacture_need->save();
                }
            }
        }

        //預計購買設備
        $manufacture_expected_datas = ManufactureExpected::where('project_id',$project->id)->get();
        if(count($manufacture_expected_datas) > 0) {
            $manufacture_expected_datas = ManufactureExpected::where('project_id',$project->id)->delete();
        }
        if(isset($request->expected_names))
        {
            foreach($request->expected_names as $key=>$expected_name)
            {
                if(isset($expected_name))
                {
                    $manufacture_expected = new ManufactureExpected;
                    $manufacture_expected->user_id = $id;
                    $manufacture_expected->project_id = $project->id;
                    $manufacture_expected->name= $request->expected_names[$key];
                    $manufacture_expected->brand= $request->expected_brands[$key];
                    $manufacture_expected->model= $request->expected_models[$key];
                    $manufacture_expected->purpose= $request->expected_purposes[$key];
                    $manufacture_expected->cost= $request->expected_costs[$key];
                    $manufacture_expected->procurement= $request->expected_procurements[$key];
                    $manufacture_expected->origin= $request->expected_origins[$key];
                    $manufacture_expected->save();
                }
            }
        }

        //預計改善設備
        $manufacture_impove_datas = ManufactureImprove::where('project_id',$project->id)->get();
        if(count($manufacture_impove_datas) > 0) {
            $manufacture_impove_datas = ManufactureImprove::where('project_id',$project->id)->delete();
        }
        if(isset($request->improve_names))
        {
            foreach($request->improve_names as $key=>$improve_name)
            {
                if(isset($improve_name))
                {
                    $manufacture_improve = new ManufactureImprove;
                    $manufacture_improve->user_id = $id;
                    $manufacture_improve->project_id = $project->id;
                    $manufacture_improve->name= $request->improve_names[$key];
                    $manufacture_improve->focus= $request->improve_focuss[$key];
                    $manufacture_improve->cost= $request->improve_costs[$key];
                    $manufacture_improve->delegate_object= $request->improve_delegate_objects[$key];
                    $manufacture_improve->save();
                }
            }
        }

        return redirect()->route('user.project.Manufacturing.create',$id)->with('success', '客戶已成功新增');
    }

    private function convertToRocDate($date)
    {
        if ($date) {
            $dateObj = new \DateTime($date);
            $gregorianYear = $dateObj->format('Y');
            $monthDay = $dateObj->format('m月d日');

            // Convert to ROC year by subtracting 1911
            $rocYear = $gregorianYear - 1911;

            // Return in the format '民國XXX年XX月XX日'
            return  $rocYear . '年' . $monthDay;
        }
        return null;
    }

}

