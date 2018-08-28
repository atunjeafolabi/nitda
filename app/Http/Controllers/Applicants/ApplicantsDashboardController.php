<?php

namespace App\Http\Controllers\Applicants;

use App\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicantsDashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('applicant')->user()->id;
        
        $applicant = Applicant::find($id)->first();
        
        return view('applicants.dashboard')->with('applicant', $applicant);
    }
}
