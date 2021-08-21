<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\account;
use Carbon\Carbon;

class domainController extends Controller
{








public function domainExp15(){
    $data = account::whereRaw('DATEDIFF(domain_exp_date,now())<=15')->get();

    return view ('webtech.domain-exp-15',['data'=>$data]);
    
}

public function domainExp7(){
    $data = account::whereRaw('DATEDIFF(domain_exp_date,now())<=7')->get();

    return view ('webtech.domain-exp-7',['data'=>$data]);
    
}
public function domainExpired(){
    
    $data = account::whereRaw('DATEDIFF(domain_exp_date,now())<=0')->get();

    return view ('webtech.domain-expired',['data'=>$data]);
    
}
public function domainDeleted(){
    $data = account::where('status' , 'delete')->get();
   

    return view ('webtech.domain-deleted',['data'=>$data]);
    
}
public function domainSuspend(){
    
    $data = account::where('status' , 'suspend')->get();

    return view ('webtech.domain-suspend',['data'=>$data]);
    
}

}