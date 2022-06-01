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
            $hours = strval(floor($value / 60));
            $minutes = strval(($value % 60 <= 9) ? ('0' . $value % 60) : $value % 60);
            return $hours . ":" . $minutes;
        } else {
            $value = abs($value);
            $hours = strval(round(floor($value / 60), 0));
            $minutes = strval(($value % 60 <= 9) ? ('0' . $value % 60) : $value % 60);
            return ' -' . $hours . ':' . $minutes;
        }
    }


    public function Statistics()
    {
        $today = Carbon::now();
        //condition fix bug in first day of month
        if ($today->toDateString() == $today->copy()->startOfMonth()->toDateString()) {
            $today = $today->copy()->subDays(1);
            $days_in_this_month = $today->daysInMonth;
        } else {
            $days_in_this_month = $today->diffInDays($today->copy()->firstOfMonth());
        }
        $previous_month = $today->copy()->subMonth();
        $previous_y = $previous_month->year;
        $previous_m = $previous_month->month;
        $month_name = $today->monthName;
        $year = $today->year;
        // $days_in_this_month = $today->diffInDays($today->copy()->firstOfMonth());
        $firstOfmonth = $today->copy()->firstOfMonth()->toDateString();
        $yesterday = $today->copy()->subDay(1)->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();

        $current_month_stats = array();

        foreach ($Activities as $value) {

            $Checkins = Checkin::whereBetween('date', [$firstOfmonth, $yesterday])->where('id_engagement', '=', $value['id'])->get();
            $total = $Checkins->sum('value');
            $current_plan = $value['target'] * $days_in_this_month;
            // $avg = intval(ceil($Checkins->sum('value') / $days_in_this_month));
            $avg = round($Checkins->sum('value') / $days_in_this_month, 2);

            $current_month_stats[$value['name']]['total'] = ($value['type'] == 2) ? $this->ConvertTime($total) : $total;
            $current_month_stats[$value['name']]['avg'] = ($value['type'] == 2) ? $this->ConvertTime(intval($avg)) : $avg;
            $current_month_stats[$value['name']]['current_target'] = ($value['type'] == 2) ? $this->ConvertTime($current_plan) : $current_plan;
            $current_month_stats[$value['name']]['surplus_shortage'] = ($value['type'] == 2) ? $this->ConvertTime($total - $current_plan) : $total - $current_plan;
            $current_month_stats[$value['name']]['realization'] = round(($total / $current_plan) * 100, 1);
        }

        return view('statistics.current_month', ['current_month_stats' => $current_month_stats, 'month_name' => $month_name, 'year' => $year, 'previous_y' => $previous_y, 'previous_m' => $previous_m]);
    }

    public function monthly_statistics(Request $request, int $year, int $month)
    {
        $month_date = Carbon::create($year, $month);
        $first_date = Checkin::first()->only('date');
        $previous_month = $month_date->copy()->subMonth();
        $next_month = $month_date->copy()->addMonth();
        $button_next_condition = ($next_month->isSameMonth(Carbon::now()));
        $button_previous_condition = ($month_date->isSameMonth(Carbon::create($first_date['date'])));
        $previous_y = $previous_month->year;
        $previous_m = $previous_month->month;
        $next_y = $next_month->year;
        $next_m = $next_month->month;
        $month_name = $month_date->monthName;
        $days_in_this_month = $month_date->daysInMonth;
        $firstOfmonth = $month_date->firstOfMonth()->toDateString();
        $lastOfMonth = $month_date->lastOfMonth()->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();

        $month_stats = array();
        foreach ($Activities as $value) {

            $Checkins = Checkin::whereBetween('date', [$firstOfmonth, $lastOfMonth])->where('id_engagement', '=', $value['id'])->get();
            $total = $Checkins->sum('value');
            $current_plan = $value['target'] * $days_in_this_month;
            $avg = round($Checkins->sum('value') / $days_in_this_month, 2);
            $month_stats[$value['name']]['total'] = ($value['type'] == 2) ? $this->ConvertTime($total) : $total;
            $month_stats[$value['name']]['avg'] = ($value['type'] == 2) ? $this->ConvertTime(intval($avg)) : $avg;
            $month_stats[$value['name']]['current_target'] = ($value['type'] == 2) ? $this->ConvertTime($current_plan) : $current_plan;
            $month_stats[$value['name']]['surplus_shortage'] = ($value['type'] == 2) ? $this->ConvertTime($total - $current_plan) : $total - $current_plan;
            $month_stats[$value['name']]['realization'] = round(($total / $current_plan) * 100, 1);
        }

        return view('statistics.month_stats', ['month_stats' => $month_stats, 'month_name' => $month_name, 'year' => $year, 'previous_y' => $previous_y, 'previous_m' => $previous_m, 'next_y' => $next_y, 'next_m' => $next_m, 'button_previous_condition' => $button_previous_condition, 'button_next_condition' => $button_next_condition]);
    }
    public function day_statistics(Request $request, int $number_of_days)
    {
        $today = Carbon::now();
        $yesterday = $today->copy()->subDay(1)->toDateString();
        $starting_date = $today->copy()->subDay($number_of_days)->format('d-m-Y'); //to blade
        $ending_date = $today->copy()->subDay(1)->format('d-m-Y'); //to blade
        $firstOfmonth = $today->copy()->firstOfMonth()->toDateString();
        $Activities = Engagement::whereDate('end_date', '>', $firstOfmonth)->orWhere('end_date', '=', null)->get();
        $starting_day = $today->copy()->subDay($number_of_days)->toDateString();
        $current_days_stats = array();

        foreach ($Activities as $value) {

            $Checkins = Checkin::whereBetween('date', [$starting_day, $yesterday])->where('id_engagement', '=', $value['id'])->get();
            $total = $Checkins->sum('value');
            $current_plan = $value['target'] * $number_of_days;
            $avg = round($Checkins->sum('value') / $number_of_days, 2);

            $current_days_stats[$value['name']]['total'] = ($value['type'] == 2) ? $this->ConvertTime($total) : $total;
            $current_days_stats[$value['name']]['avg'] = ($value['type'] == 2) ? $avg : $avg;
            $current_days_stats[$value['name']]['current_target'] = ($value['type'] == 2) ? $this->ConvertTime($current_plan) : $current_plan;
            $current_days_stats[$value['name']]['surplus_shortage'] = ($value['type'] == 2) ? $this->ConvertTime($total - $current_plan) : $total - $current_plan;
            $current_days_stats[$value['name']]['realization'] = round(($total / $current_plan) * 100, 1);
        }
        return view('statistics.days_stats', ['current_days_stats' => $current_days_stats, 'number_of_days' => $number_of_days, 'starting_day' => $starting_date, 'ending_day' => $ending_date]);
    }
}
