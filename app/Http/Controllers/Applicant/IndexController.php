<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        //home page
        return view("applicant.index");
    }
    
    public function contactUs() {
        
    }
    
    public function faq() {
        
    }
}
