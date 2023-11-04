<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticControllerr extends Controller
{
    //
    public function showEventAnalytic($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.analytic', ['event_id' => $event_id]);
    }
}
