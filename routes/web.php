<?php

use App\Models\Engagement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Activity\CheckinController;
use App\Http\Controllers\Activity\StatisticsController;

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
Route::get('/add_in_checkin', [CheckinController::class, 'add_in_checkin']);
Route::get('/statistics', [StatisticsController::class, 'statistics'])
    ->name('statistics');
