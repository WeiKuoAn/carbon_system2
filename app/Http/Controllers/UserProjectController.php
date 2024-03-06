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
use App\Models\ManufactureThreeIncome;
use App\Models\ManufactureIso;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;

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
                    $cust_personnel->user_id = Auth::user()->id;
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
}
