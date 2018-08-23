<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        //home page
        return view("index");
    }
    
    public function contactUs() {
        
    }
    
    public function faq() {
        
    }
}
