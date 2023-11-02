<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function createNewEvent(){
        return view('pages.user_pages.create_event');
    }

    public function showUserEvent(){
        return view('pages.user_pages.my_event');
    }

    public function showAllEvent(){
        return view('pages.events');
    }

    public function showSelectedEvent(){
        return view('pages.eventinfo');
    }
    
    public function showEventInfo(){
        return view('pages.my_event_pages.info');
    }

    public function showEventSchedule(){
        return view('pages.my_event_pages.schedule');
    }
}
