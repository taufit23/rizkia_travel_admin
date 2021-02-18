<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\data_jamaah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysqli;
use PhpParser\Node\Stmt\While_;

// use App\Import\


class DashboardController extends Controller
{
    public function index()
    {
        $countall = data_jamaah::count();
        $time = Carbon::now();
        
        $data_jamaah = data_jamaah::select('tanggal_keberangkatan');
        
        
        return view('admin/index', compact('countall', 'time'));
    }
    
}
