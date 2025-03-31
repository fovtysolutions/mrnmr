<?php

namespace App\Controllers;

class CalendarController extends BaseController
{
    public function index()
    {
        return view('admin/calendar/calendar',[ 'dashboard' => 'Calendar', 'title' => 'Calendar' ]);
    }
}