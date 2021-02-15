<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\data_jamaah;

// use App\Import\


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
    
}

