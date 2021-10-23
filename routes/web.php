<?php

use App\Models\Programming;
use App\Models\Engagement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\Activity\Test2controller;
//use App\Http\Controllers\Activitycontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.dashboard');
});




// Route::get('/', function () {
//     return 'Hello World';
// });
// Route::get('/create', 'ActivityController@view')
//     ->name('create');
Route::get('/list', [ActivityController::class, 'list'])
    ->name('list');
Route::get('/create', [ActivityController::class, 'index'])
    ->name('create');

Route::post('/create', [ActivityController::class, 'create']);


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
