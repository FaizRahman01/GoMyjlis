<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function showEventPoll($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.poll', ['event_id' => $event_id]);
    }

    public function showEventRating($id)
    {
        $event_id = $id;
        return view('pages.my_event_pages.rating', ['event_id' => $event_id]);
    }
}
