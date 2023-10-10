<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyFace;
use App\Models\SurveyQuestion;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $survey = Survey::where('id',$id)->first();
        $datas = SurveyQuestion::where('survey_id',$id)->get();
        return view('survey.question_index')->with('survey',$survey)->with('datas',$datas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $faces = SurveyFace::where('survey_id',$id)->get();
        $survey_id = $id;
        return view('survey.question_create')->with('faces',$faces)->with('survey_id',$survey_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        $faceIds = $request->input('face_ids');
        $nos = $request->input('ons');
        $types = $request->input('types');
        $titles = $request->input('titles');
        // 確保輸入數據的數量相同
        $count = count($nos);
        // dd

        for ($i = 0; $i < $count; $i++) {
            $survey = new SurveyQuestion;
            $survey->survey_id = $id;
            $survey->face_id = $faceIds[$i];
            $survey->type = $types[$i];
            $survey->title = $titles[$i];
            $survey->no = $nos[$i];
            $j = $i+1;

            // 將每個題目的答案選項和分數轉為 JSON 格式
            $survey->options = json_encode($request->input('options')[$j]);
            $survey->scores = json_encode($request->input('scores')[$j]);
            

            $survey->save();
        }

        return redirect()->route('survey.questions.index',$id);
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
        $faces = SurveyFace::where('survey_id',$id)->get();
        $datas = SurveyQuestion::where('survey_id',$id)->get();
        $survey_id = $id;
        return view('survey.question_edit')->with('faces',$faces)->with('survey_id',$survey_id)->with('datas',$datas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SurveyQuestion::where('survey_id',$id)->delete();
        
        $faceIds = $request->input('face_ids');
        $nos = $request->input('ons');
        $types = $request->input('types');
        $titles = $request->input('titles');
        // 確保輸入數據的數量相同
        $count = count($faceIds);
        // dd

        for ($i = 0; $i < $count; $i++) {
            $survey = new SurveyQuestion;
            $survey->survey_id = $id;
            $survey->face_id = $faceIds[$i];
            $survey->type = $types[$i];
            $survey->title = $titles[$i];
            $survey->no = $nos[$i];
            $j = $i+1;

            // 將每個題目的答案選項和分數轉為 JSON 格式
            $survey->options = json_encode($request->input('options')[$j]);
            $survey->scores = json_encode($request->input('scores')[$j]);
            

            $survey->save();
        }

        return redirect()->route('survey.questions.index',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
