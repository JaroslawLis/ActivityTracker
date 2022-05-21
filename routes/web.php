<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Activity\CheckinController;
use App\Http\Controllers\Activity\StatisticsController;
use App\Http\Controllers\Activity\ChartJSController;
use App\Http\Controllers\Activity\DashboardController;

// temporary
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', function () {
    //     return view('layouts.dashboard');
    // })->name('main');
    Route::get('/', [DashboardController::class, 'index'])
        ->name('main');
    Route::get('/list', [ActivityController::class, 'list'])
        ->name('list');
    Route::get('list/{activityId}', [ActivityController::class, 'show'])
        ->name('get.activity.show');
    Route::get('list/edit/{activityId}', [ActivityController::class, 'edit'])
        ->name('get.activity.edit');
    Route::get('/create', [ActivityController::class, 'index'])
        ->name('create');
    Route::post('/create', [ActivityController::class, 'create']);
    Route::post('/update/{editId}', [ActivityController::class, 'update']);
    Route::get('/add_checkin', [CheckinController::class, 'index'])
        ->name('add_checkin');
    Route::post('/add_checkin', [CheckinController::class, 'add_checkin']);
    Route::get('/add_in_checkin', [CheckinController::class, 'add_in_checkin']);
    Route::get('/statistics', [StatisticsController::class, 'statistics'])
        ->name('statistics');
    Route::get('/days_stat/{number_of_days}', [StatisticsController::class, 'day_statistics'])
        ->name('days_statistics');

    Route::get('/monthly_stat/{year}/{month}', [StatisticsController::class, 'monthly_statistics'])
        ->name('monthly_statistics');
    Route::get('charts', [ChartJSController::class, 'index'])
        ->name('current_charts');
    Route::get('bar_charts', [ChartJSController::class, 'bar_charts'])
        ->name('current_bar_charts');
});

require __DIR__ . '/auth.php';
