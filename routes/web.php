<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Activity\CheckinController;
use App\Http\Controllers\Activity\StatisticsController;

Route::get('/', function () {
    return view('layouts.dashboard');
})->name('main');

Route::get('/list', [ActivityController::class, 'list'])
    ->name('list');
Route::get('list/{activityId}', [ActivityController::class, 'show'])
    ->name('get.activity.show');
Route::get('list/edit/{activityId}', [ActivityController::class, 'edit'])
    ->name('get.activity.edit');
Route::get('/create', [ActivityController::class, 'index'])
    ->name('create');
Route::post('/create', [ActivityController::class, 'create']);
Route::get('/add_checkin', [CheckinController::class, 'index'])
    ->name('add_checkin');
Route::post('/add_checkin', [CheckinController::class, 'add_checkin']);
Route::get('/add_in_checkin', [CheckinController::class, 'add_in_checkin']);
Route::get('/statistics', [StatisticsController::class, 'statistics'])
    ->name('statistics');
