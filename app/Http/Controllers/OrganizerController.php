<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    public function showEventSupport()
    {
        return view('pages.my_event_pages.support');
    }

    public function showEventTask()
    {
        return view('pages.my_event_pages.task');
    }

    public function showEventVendor()
    {
        return view('pages.my_event_pages.vendor');
    }
}
