<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Medicine;


class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

    public function countExpiredMeds() 
    {
        
        $meds = Medicine::where('status', 'In Date')->get();
        
        return count($meds);

    }
   

  

  

  

}
