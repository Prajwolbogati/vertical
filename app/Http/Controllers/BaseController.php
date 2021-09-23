<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\servicetype;

class BaseController extends Controller
{
    public function _construct(){
        $services = servicetype::with('child')->get();
          
        View::share([
            'services'=>$services
      
         
    
      ]);
       }
}
