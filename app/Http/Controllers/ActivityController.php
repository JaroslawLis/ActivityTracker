<?php

//namespace App\Http\Controllers\Activity;

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Repository\ActivityRepository;
//C:\xampp\htdocs\activitytracker\app\Http\Controllers\Activity\ActivityController.php
class ActivityController extends Controller
{
    // private ActivityRepository $activityRepository;

    // public function __construct(ActivityRepository $repository)
    // {
    //     $this->activityRepository = $repository;
    // }

    public function index(): View
    {
        return view('layouts.create_eng');
    }
}
