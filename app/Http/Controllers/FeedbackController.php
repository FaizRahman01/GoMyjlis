<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function showEventPoll()
    {
        return view('pages.my_event_pages.poll');
    }

    public function showEventRating()
    {
        return view('pages.my_event_pages.rating');
    }
}
