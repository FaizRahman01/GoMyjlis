<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    public function showEventSupport($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.support', ['event_id' => $event_id]);
    }

    public function showEventTask($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.task', ['event_id' => $event_id]);
    }

    public function showEventVendor($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.vendor', ['event_id' => $event_id]);
    }
}
