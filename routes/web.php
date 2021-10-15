<?php

use App\Models\Programming;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;
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

// Route::get('/', function () {
//     return view('layouts.main');
// });
Route::get('/', [Testcontroller::class, 'index']);
//->name('home.mainPage');;

// Route::get('/', function () {
//     return 'Hello World';
// });
