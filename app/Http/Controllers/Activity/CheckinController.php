<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Engagement;
use App\Models\Checkin;
use Illuminate\View\View;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index(): View
    {
        $Activities = Engagement::all();


        return view('layouts.add_checkin', ['activities' => $Activities]);
    }

    public function add_checkin()
    {
        dd($_POST);
    }
}
