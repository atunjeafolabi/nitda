<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-dashboard');
    }
}
