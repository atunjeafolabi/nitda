<?php

namespace App\Http\Controllers\Applicants;

use App\Http\Controllers\Controller;

class ApplicantsDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicants.dashboard');
    }
}
