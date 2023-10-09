<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Panelmember extends Controller
{
    //


    public function paneldashboard()
    {
     
        return view('dashboard.paneldashboard');
    }

 public function interviewform()
    {
     
        return view('panelmembers.interviewform');
    }



    
    

}
