<?php

use App\Models\Engagement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Activity\CheckinController;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\Activity\Test2controller;
//use App\Http\Controllers\Activitycontroller;


Route::get('/', function () {
    return view('layouts.dashboard');
});

Route::get('/list', [ActivityController::class, 'list'])
    ->name('list');
Route::get('/create', [ActivityController::class, 'index'])
    ->name('create');
Route::post('/create', [ActivityController::class, 'create']);
Route::get('/add_checkin', [CheckinController::class, 'index'])
    ->name('add_checkin');
Route::post('/add_checkin', [CheckinController::class, 'add_checkin']);


Route::post('/create2', function () {
    $activity = new Engagement();
    $activity->name = request('name');
    $activity->description = request('description');
    $activity->starting_date = request('starting_date');
    $activity->end_date = request('end_date');
    $activity->type = request('type');
    $activity->target = request('target');
    $activity->max_value = request('max_value');
    // dd(request(), $activity, $_POST);
    // dd($activity);
    $activity->save();
});
//Route::get('/create', function () {
//     return view('layouts.create_eng');
// });
// Route::post('/create', function () {
//     $activity = new Engagement();
//     $activity->name = request('name');
//     $activity->description = request('description');
//     $activity->starting_date = request('starting_date');
//     $activity->end_date = request('end_date');
//     $activity->type = request('type');
//     $activity->target = request('target');
//     $activity->max_value = request('max_value');
//     // dd(request(), $activity, $_POST);
//     // dd($activity);
//     $activity->save();
// });


// Route::get('/', function () {
//     return view('layouts.main');
// });
