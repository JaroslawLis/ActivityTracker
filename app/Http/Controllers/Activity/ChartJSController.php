<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Engagement;
use App\Models\Checkin;
use Carbon\Carbon;

class ChartJSController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $days_in_this_month = $today->diffInDays($today->copy()->firstOfMonth());
        $yesterday = $today->copy()->subDay(1)->toDateString();
        $firstOfmonth = $today->copy()->firstOfMonth()->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();
        $charts_data = array();
        foreach ($Activities as $activity) {
            $Checkins = Checkin::whereBetween('date', [$firstOfmonth, $yesterday])->where('id_engagement', '=', $activity->id)->get();
            $chart_data = array();
            $target = $activity->target;
            $activity_name = $activity->name;
            $label_day = $today->copy()->firstOfmonth();
            for ($i = 1; $i <= $days_in_this_month; $i++) {
                $day = $label_day->copy()->toDateString();
                $label_day = $label_day->addDay(1);
                $chart_data[$day] = 0;
            }
            foreach ($Checkins as $checkin) {
                $chart_data[$checkin->date] = $checkin->value;
            }
            $average_chart_data = array();
            $target_chart_data = array();
            $label_day = $today->copy()->firstOfmonth();
            $incrementally = 0;
            for ($i = 1; $i <= $days_in_this_month; $i++) {
                $day = $label_day->copy()->toDateString();
                $label_day = $label_day->addDay(1);
                $incrementally = $incrementally + $chart_data[$day];
                $average_chart_data[$day] = round($incrementally / $i, 1);
                array_push($target_chart_data, $target);
            }

            $charts_data[$activity_name] = [
                "labels" => array_keys($average_chart_data), "values" => array_values($average_chart_data), "target" => array_values($target_chart_data)
            ];
        }

        return view('charts.chart-js', compact('charts_data'));
    }
}
