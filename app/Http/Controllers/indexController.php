<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Services;
use App\Team;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index()
    {

    	$services = Services::all();
        $projects = Projects::all();
        $teams = Team::all();

        return view('layouts.main', compact('services','projects','teams'));

    }

    public function indexX()
    {

        return view('welcome');

    }

}
