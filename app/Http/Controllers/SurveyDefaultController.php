<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyDefault;

class SurveyDefaultController extends Controller
{
    public function create($id)
    {
        $survey = Survey::where('id',$id)->first();

        $datas = SurveyDefault::where('survey_id',$id)->get();
        // dd($datas);
        if(count($datas)>0){
            return redirect()->route('survey.questions.default.edit',$id)->with('survey',$survey);
        }else{
            return view('survey.default_create')->with('survey',$survey);
        }
    }

    public function edit($id)
    {
        $survey = Survey::where('id',$id)->first();

        $datas = SurveyDefault::where('survey_id',$id)->get();
        // dd($datas);
        return view('survey.default_edit')->with('survey',$survey)->with('datas',$datas);
    }

    public function store(Request $request , $id)
    {
        // dd($request->scores);
        foreach($request->scores as $key=>$score)
        {
            $data = new SurveyDefault();
            $data->survey_id = $id;
            $data->score = $score;
            $data->reply = $request->replys[$key];
            $data->suggestion = $request->suggestions[$key];
            $data->save();
        }
        $survey = Survey::where('id',$id)->first();
        return view('survey.default_create')->with('survey',$survey);
    }
}
