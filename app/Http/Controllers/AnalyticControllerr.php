<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticControllerr extends Controller
{
    //
    public function showEventAnalytic()
    {
        return view('pages.my_event_pages.analytic');
    }
}
