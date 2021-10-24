<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\calendar;


class MaintenanceController extends Controller
{
    //
    public function addcalendar(Request $req){
        $calendar = new calendar();
        $calendar->title_event = $req->title;
        $calendar->theme = $req->theme;
        $calendar->created_at = $req->date;
        $calendar->save();
        return redirect()->route('calendar');

      }
}
