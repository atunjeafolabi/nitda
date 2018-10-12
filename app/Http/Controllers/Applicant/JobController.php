<?php

namespace App\Http\Controllers\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index(){
        
    }
    
    public function show($job_id) {
        
        return view('applicant.job.show');
    }
    
    public function apply() {
        
    }
}
