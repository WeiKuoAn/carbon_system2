<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Imports\ProcessEmissionImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use App\Models\ProcessEmission;
use App\Models\ProcessData;
use App\Models\Branch;

class ExcelImportController extends Controller
{
    public function index($id)
    {
        $datas = ProcessData::where('customer_id',$id)->orderby('year','desc')->get();
        return view('process_emission.index')->with('datas',$datas)->with('customer_id',$id);
    }

    public function show($id,$process_emission_id)
    {
        $datas = ProcessEmission::where('process_emission_id',$process_emission_id)->orderby('single_source_percentage','desc')->get();
        return view('process_emission.data')->with('datas',$datas)->with('customer_id',$id);
    }

    public function showImportForm($id)
    {   
        $branches = Branch::where('customer_id',$id)->get();
        $years = range(Carbon::now()->year, 1990);
        $datas = ProcessEmission::get();
        return view('process_emission.import')->with('datas', $datas)->with('years', $years)->with('customer_id',$id)->with('branches',$branches);
    }

    public function process_emission_ajax(string $id , $branch_id , $year) 
    {
        $process_emission_data = ProcessData::where('customer_id',$id)->where('branch_id',$branch_id)->where('year',$year)->first();
        
        // 注意：这里我们直接使用了 $id，不需要再从请求中获取 editId
        $emission = ProcessEmission::where('process_emission_id', $process_emission_data->id)->orderby('single_source_percentage','desc')->get();
        
        return response()->json($emission);
    }
    
    public function import(Request $request , $id)
    {
        // dd($request->all());
        $processData = new ProcessData();
        $processData->customer_id = $id;
        $processData->branch_id = $request->branch_id;
        $processData->year = $request->year;
        $processData->save();

        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls,csv'
        ]);
        Excel::import(new ProcessEmissionImport, $request->file('excel'));

        $datas = ProcessEmission::get();
        // dd($datas);

        return redirect()->route('process_emission.index',$id)->with('success', 'Excel file imported successfully!')->with('datas', $datas);
    }
}
