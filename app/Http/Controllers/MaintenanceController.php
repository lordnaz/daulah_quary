<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calendar as Report;


class MaintenanceController extends Controller
{
    //

    public function index(){

        // $collection = Report::orderBy('id', 'asc')->get();

        // return $collection;

        // foreach ($collection as $item) {
            
        // }

        // die();

        // return view('calender', compact('collection'));

        return view('maintenance');
    }
    
    public function view_report(){

        $collection = Report::orderBy('id', 'desc')->paginate(8);
        $total = Report::all();

        // return $collection;
        // die();

        // return view('maintenance-view', compact('collection'));

        return view('maintenance-view')->with('collection', $collection)->with('totals', $total);
    }

    public function add_report(Request $req){

        $date = $req->input();

        $uuid = auth()->user()->id;
        $username = auth()->user()->name;

        $currentdt = date('Y-m-d H:i:s');

        // return $date;

        // die();

        $formFile = $req->file('file-upload');

        // return $formFile;

        // die();
        $doc_path = null;

        if($formFile){
            $uploadFile = $this->UploadFile($formFile);
            $doc_path = "/storage/report/".$uploadFile;
        }

        $report = new Report();
        $report->title = $req->title;
        $report->description = $req->description;
        $report->doc_path = $doc_path;
        $report->created_by = $username;
        $report->created_at = $currentdt;
        $report->updated_at = $currentdt;
        $report->save();

        return redirect()->route('view_report');

    }


    function UploadFile($file){

        $file_name = null;

    	if($file){
    		// $file_name = $file->getClientoriginalName();
    		// $mime_type = $file->getClientmimeType();
            $extension = $file->extension();

            $file_name = uniqid('').".".$extension;

    		// upload into doc path
            $file->move('storage/report', $file_name);

    	}

        return $file_name;
    }
}
