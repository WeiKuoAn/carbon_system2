<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyFace;
use App\Models\SurveyQuestion;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Survey::get();
        return view('survey.index')->with('datas',$datas);
    }

    public function preview($id)
    {
        $survey = Survey::where('id',$id)->first();
        $question_datas = SurveyQuestion::where('survey_id',$id)->get();
        return view('survey.question_preview')->with('survey',$survey)->with('question_datas',$question_datas);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Survey;
        $data->category = $request->category;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->save();

        $survey = Survey::orderby('id','desc')->first();
        foreach($request->faces as $key=>$face)
        {
            if(isset($face))
            {
                $face_data = new SurveyFace;
                $face_data->survey_id = $survey->id;
                $face_data->name = $face;
                $face_data->description = $request->face_descs[$key];
                $face_data->save();
            }
        }
        return redirect()->route('survey.index');
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
        $data = Survey::where('id',$id)->first();
        return view('survey.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Survey::where('id',$id)->first();
        $data->category = $request->category;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->save();

        SurveyFace::where('survey_id',$id)->delete();
        foreach($request->faces as $key=>$face)
        {
            if(isset($face))
            {
                $face_data = new SurveyFace;
                $face_data->survey_id = $id;
                $face_data->name = $face;
                $face_data->description = $request->face_descs[$key];
                $face_data->save();
            }
        }

        return redirect()->route('survey.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
