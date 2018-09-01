<?php

namespace App\Http\Controllers\Applicant;

use App\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        
        return view('applicant.dashboard')->with('applicant', $applicant);
    }
}
