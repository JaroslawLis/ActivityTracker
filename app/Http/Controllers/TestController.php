<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Programming;

class TestController extends Controller
{
    public function index(): View
    {
        $list = Programming::all();
        //  var_dump($list);
        return view('layouts.main', [
            'list' => $list
        ]);
    }
}
