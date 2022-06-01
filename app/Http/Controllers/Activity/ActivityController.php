<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Engagement;
use Illuminate\View\View;
use Illuminate\Http\Request;

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

    public function update(Request $request, int $editId)
    {
        $activity = Engagement::findOrFail($editId);
        if ($activity->name != request('name')) {
            $activity->name = request('name');
        };
        if ($activity->description != request('description')) {
            $activity->description = request('description');
        };
        if ($activity->starting_date != request('starting_date')) {
            $activity->starting_date = request('starting_date');
        };
        if ($activity->end_date != request('end_date')) {
            $activity->end_date = request('end_date');
        };
        if ($activity->type != request('type')) {
            $activity->type = request('type');
        };
        if ($activity->target != request('target')) {
            $activity->target = request('target');
        };
        if ($activity->max_value != request('max_value')) {
            $activity->max_value = request('max_value');
        };

        $activity->save();
        return redirect('/')->with('success', 'Update success');
    }

    public function list(): View
    {
        $activities = Engagement::all();
        return view('layouts.list', ['activities' => $activities]);
    }

    public function show(Request $request, int $activityId)
    {
        $activity = Engagement::findOrFail($activityId);
        return view('show', ['editId' => $activityId, 'activity' => $activity]);
    }

    public function edit(Request $request, int $activityId)
    {
        $activity = Engagement::findOrFail($activityId);

        return view('edit', ['editId' => $activityId, 'name' => $activity->name, 'description' => $activity->description, 'starting_date' => $activity->starting_date, 'type' => $activity->type, 'target' => $activity->target, 'end_date' => $activity->end_date, 'max_value' => $activity->max_value]);
    }
}
