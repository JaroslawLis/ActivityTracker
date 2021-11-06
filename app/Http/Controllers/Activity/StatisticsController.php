<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Engagement;
use App\Models\Checkin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    // convert minuts to hours:minutes format
    private function ConvertTime($value)
    {
        if ($value > 0) {
            $hours = floor($value / 60);
            $minutes = ($value % 60 <= 9) ? ('0' . $value % 60) : $value % 60;
            return $hours . ':' . $minutes;
        } else {
            $value = abs($value);
            $hours = floor($value / 60);
            $minutes = $value % 60;
            return ' -' . $hours . ':' . $minutes;
        }
    }

    public function Statistics()
    {
        $today = Carbon::now();
        $today2 = Carbon::now();
        $days_in_this_month = $today->diffInDays($today->copy()->firstOfMonth());
        $firstOfmonth = $today2->firstOfMonth()->toDateString();
        $yesterday = $today->subDay(1)->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();
        $current_month_stats = array();

        foreach ($Activities as $value) {

            $Checkins = Checkin::whereBetween('date', [$firstOfmonth, $yesterday])->where('id_engagement', '=', $value['id'])->get();
            $total = $Checkins->sum('value');
            $current_plan = $value['target'] * $days_in_this_month;
            $avg = intval(ceil($Checkins->sum('value') / $days_in_this_month));
            $current_month_stats[$value['name']]['total'] = ($value['type'] == 2) ? $this->ConvertTime($total) : $total;
            $current_month_stats[$value['name']]['avg'] = ($value['type'] == 2) ? $this->ConvertTime($avg) : $avg;
            $current_month_stats[$value['name']]['current_target'] = ($value['type'] == 2) ? $this->ConvertTime($current_plan) : $current_plan;
            $current_month_stats[$value['name']]['surplus_shortage'] = ($value['type'] == 2) ? $this->ConvertTime($total - $current_plan) : $total - $current_plan;
        }


        return view('layouts.statistics', ['current_month_stats' => $current_month_stats]);
    }
}
