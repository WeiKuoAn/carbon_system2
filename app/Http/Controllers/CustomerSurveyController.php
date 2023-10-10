<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\Customer;
use App\Models\SurveyResponse;

class CustomerSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $customer_id = $id;
        $datas = Survey::where('status',0)->get();
        $reponses = SurveyResponse::where('customer_id',$customer_id)->get();
        // dd($reponses);

        return view('customer-survey.index')->with('datas',$datas)->with('customer_id',$customer_id)->with('reponses',$reponses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id , $survey_id)
    {
        $customer_id = $id;
        $survey = Survey::where('id',$survey_id)->first();
        $question_datas = SurveyQuestion::where('survey_id',$survey_id)->get();
        return view('customer-survey.create')->with('survey',$survey)->with('question_datas',$question_datas)->with('customer_id',$customer_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id ,$survey_id)
    {
        $answers = [];
        $totalScore = 0;

        // 从请求中提取所有输入项
        foreach ($request->all() as $key => $value) {
            // 检查输入项名称是否以 'formRadios_' 开头
            if (strpos($key, 'formRadios_') === 0) {
                $questionNumber = str_replace('formRadios_', '', $key);
                $answers['ons_' . $questionNumber] = $value;
                $totalScore += (int) $value;  // 增加得分
            }
        }

        // dd($answers);

        $data = new SurveyResponse();
        $data->survey_id = $survey_id;
        $data->customer_id = $id;
        $data->answers_data = json_encode($answers);
        $data->score = $totalScore;
        $data->save();
        return redirect()->route('cust.surveys.index',[$id]);
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
    public function edit(string $id , $survey_id)
    {
        $customer_id = $id;
        $survey = Survey::where('id',$survey_id)->first();
        $question_datas = SurveyQuestion::where('survey_id',$survey_id)->get();
        $reponse_data = SurveyResponse::where('survey_id',$survey_id)->where('customer_id',$id)->first();
        $answers_datas = json_decode($reponse_data->answers_data);
        // foreach($answers_datas as $key=>$answers_data)
        // {
        //     dd($answers_data);
        // }
        return view('customer-survey.edit')->with('survey',$survey)
                                           ->with('question_datas',$question_datas)->with('customer_id',$customer_id)
                                           ->with('answers_datas',$answers_datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id , $survey_id)
    {
        $data = SurveyResponse::where('survey_id',$survey_id)->where('customer_id',$id)->first();
        $answers = [];
        $totalScore = 0;

        // 从请求中提取所有输入项
        foreach ($request->all() as $key => $value) {
            // 检查输入项名称是否以 'formRadios_' 开头
            if (strpos($key, 'formRadios_') === 0) {
                $questionNumber = str_replace('formRadios_', '', $key);
                $answers['ons_' . $questionNumber] = $value;
                $totalScore += (int) $value;  // 增加得分
            }
        }

        // dd($answers);
        // dd($data);
        $data->answers_data = json_encode($answers);
        $data->score = $totalScore;
        $data->save();

        return redirect()->route('cust.surveys.index',[$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
