<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ActiveController extends Controller
{
    public function index(): View
    {
        return view('layouts.create_eng');
    }
}
