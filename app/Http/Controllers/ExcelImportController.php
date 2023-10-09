<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProcessEmissionImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ExcelImportController extends Controller
{
    public function showImportForm()
    {
        return view('import.process_emissions');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new ProcessEmissionImport, $request->file('excel'));

        return redirect('/import')->with('success', 'Excel file imported successfully!');
    }
}
