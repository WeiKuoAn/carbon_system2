<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Customer;
use App\Models\Branch;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // dd($request->all());
        Log::info('Upload method called');
        Log::info('Files in request: ', $request->allFiles());
    
        if(!$request->hasFile('file')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    
        $file = $request->file('file');
        
        if(!$file->isValid()) {
            return response()->json(['error' => 'File is not valid'], 400);
        }
    
        $allowedFileExtensions = ['pdf','jpg','png','xlsx','docx'];
        $extension = $file->getClientOriginalExtension();
    
        if(!in_array($extension, $allowedFileExtensions)) {
            return response()->json(['error' => 'File type is not allowed'], 400);
        }
    
        $destinationPath = public_path('storage/uploads');

        // dd($request->all());
        $customer = Customer::where('id',$request->customber_id_text)->first();
        $branch = Branch::where('id',$request->branch_id_text)->first();
        $fileName = $customer->name.'_'.$branch->name.'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);
    
        $path = 'storage/uploads/' . $fileName;
        $url = asset($path);
    
        Log::info('File path: ', [$path]);
        Log::info('File URL: ', [$url]);
    
        return response()->json([
            'message' => 'File uploaded successfully',
            'url' => $url,
        ], 200);
    }
}
