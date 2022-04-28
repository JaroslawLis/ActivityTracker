<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Engagement;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $firstOfmonth = $today->copy()->firstOfMonth()->toDateString();
        $activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get()->count();
        return view('layouts.dashboard', ['activities' => $activities]);
    }
}
