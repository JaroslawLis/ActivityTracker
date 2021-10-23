<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Programming;

class Test2Controller extends Controller
{
    public function index(): View
    {
        $list = Programming::all();
        //  var_dump($list);
        return view('layouts.dashboard', [
            'list' => $list
        ]);
    }
}
