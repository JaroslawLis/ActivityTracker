<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Engagement;
use App\Models\Checkin;
use Illuminate\View\View;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index(): View
    {
        //$Activities = Engagement::all();
        $date = Checkin::latest()->first();
        $Activities = Engagement::whereDate('end_date', '>', $date)->orWhere('end_date', '=', null)->get();
        $last_entry_date = $date->date;
        $current_entry_date = Carbon::createFromDate($last_entry_date);
        $current_entry_date->add(1, 'day');
        $current_entry_date = $current_entry_date->toDateString();

        return view('layouts.add_checkin', ['activities' => $Activities, 'last_entry_date' => $current_entry_date]);
    }

    public function add_checkin(Request $request)
    {
        $input_data = $request->input();
        $date = date("Y-m-d", strtotime($input_data['date']));
        $current_entry_date = Carbon::createFromDate($date);
        $current_entry_date->add(1, 'day');
        $current_entry_date = $current_entry_date->toDateString();
        $checkins = array_filter($input_data, function ($k) {
            return ($k != '_token' && $k != 'date');
        }, ARRAY_FILTER_USE_KEY);
        if (array_sum($checkins)) {
            foreach ($checkins as $id_engagement => $value) {
                if ($value) {
                    $checkin = new Checkin;
                    $checkin->date = $current_entry_date;
                    $checkin->id_engagement = $id_engagement;
                    $checkin->value = $value;
                    $checkin->save();
                }
            };
        } else {
            $checkin = new Checkin;
            $checkin->date = $current_entry_date;
            $checkin->value = 0;
            $checkin->id_engagement = 0;
            $checkin->save();
        };
    }

    public function add_in_checkin()
    {
    }
}
