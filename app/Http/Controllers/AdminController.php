<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showAllUsers()
    {
        return view('pages.admin_pages.manage_user');
    }

    public function showAllUserEvents()
    {
        return view('pages.admin_pages.manage_user_event');
    }

    public function showEventOverview()
    {
        return view('pages.admin_pages.manage_event');
    }
}
