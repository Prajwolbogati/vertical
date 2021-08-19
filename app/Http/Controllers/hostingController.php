<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\account;
use Carbon\Carbon;

class hostingController extends Controller
{








public function hostingExp15(){
    $data = account::whereRaw('DATEDIFF(hosting_exp_date,Now())<=15')->get();

    return view ('webtech.hosting-exp-15',['data'=>$data]);
    
}

public function hostingExp7(){
    $data = account::whereRaw('DATEDIFF(hosting_exp_date,Now())<=7')->get();

    return view ('webtech.hosting-exp-7',['data'=>$data]);
    
}
public function hostingExpired(){
    


    return view ('webtech.hosting-expired');
    
}
public function hostingDeleted(){
    


    return view ('webtech.hosting-deleted');
    
}
public function hostingSuspend(){
    


    return view ('webtech.hosting-suspend');
    
}

}