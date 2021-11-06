<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Engagement;
use App\Models\Checkin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function Statistics()
    {


        $today = Carbon::now();
        $today2 = Carbon::now();
        $firstOfmonth = $today2->firstOfMonth()->toDateString();
        $yesterday = $today->subDay(1)->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();

        //dd($Activities);
        //dd($Checkins->toArray());
        //dd(array_sum(array_diff_key($my_array, array_flip(array('1')))));

        //dd($Checkins, $yesterday, $firstOfmonth, $days);
        foreach ($Activities as $key => $value) {
            $Checkins = Checkin::whereBetween('date', [$firstOfmonth, $yesterday])->where('id_engagement', '=', $value['id'])->get();
            echo $value['name'] . $Checkins->sum('value') . '<br>';
        }



        //return view('layouts.statistics');
    }
}
