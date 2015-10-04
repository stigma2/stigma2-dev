<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\CommandBuilder\CommandBuilder ;

class DashboardController extends Controller { 
    public function index()
    {
        return view('admin.dashboard.index') ;
    }
}
