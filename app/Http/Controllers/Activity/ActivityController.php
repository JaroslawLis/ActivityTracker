<?php

namespace App\Http\Controllers\Activity;


use App\Http\Controllers\Controller;
use App\Models\Engagement;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Repository\ActivityRepository;

class ActivityController extends Controller
{


    public function index(): View
    {
        return view('layouts.create_eng');
    }

    public function create()
    {
        $activity = new Engagement();
        $activity->name = request('name');
        $activity->description = request('description');
        $activity->starting_date = request('starting_date');
        $activity->end_date = request('end_date');
        $activity->type = request('type');
        $activity->target = request('target');
        $activity->max_value = request('max_value');
        $activity->save();
        return 'Add success';
    }

    public function list(): View
    {
        // $this->middleware(Request::class);

        $activities = Engagement::all();
        return view('layouts.list', ['activities' => $activities]);
    }
}
