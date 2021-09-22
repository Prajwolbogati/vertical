<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\account;
use App\Models\companyservice;
use App\Models\service;
use Carbon\Carbon;

class companyserviceController extends Controller
{



    public function all($stype_id){
        $data = companyservice::with(['account','service.parent'])
        ->whereHas('service.parent', function($q) use($stype_id) {
            $q->where('stype_id', '=', $stype_id);
        })
        ->get();
       
        return view ('webtech.all',['data'=>$data]);
        
    }




public function Exp15($stype_id){
    $data = companyservice::with(['account','service.parent'])
    ->whereHas('service.parent', function($q) use($stype_id) {
        $q->where('stype_id', '=', $stype_id);
    })
    ->whereRaw('DATEDIFF(exp_date,now())<=15')->get();
   
    return view ('webtech.status',['data'=>$data]);
    
}

public function Exp7($stype_id){
    $data = companyservice::with(['account','service.parent'])
    ->whereHas('service.parent', function($q) use($stype_id) {
        $q->where('stype_id', '=', $stype_id);
    })
    ->whereRaw('DATEDIFF(exp_date,now())<=7')

    ->orwhere('status' , 'suspend')->get();

    return view ('webtech.status',['data'=>$data]);
    
}
public function Expired($stype_id){
    
    $data = companyservice::with(['account','service.parent'])
    ->whereHas('service.parent', function($q) use($stype_id) {
        $q->where('stype_id', '=', $stype_id);
    })
    
    
    ->where('status' , 'expired')->get();

    return view ('webtech.status',['data'=>$data]);
    
}
public function Deleted($stype_id){
    $data = companyservice::with(['account','service.parent'])
    ->whereHas('service.parent', function($q) use($stype_id) {
        $q->where('stype_id', '=', $stype_id);
    })
    
    ->where('status' , 'delete')->get();
    
   

    return view ('webtech.deletestatus',['data'=>$data]);
    
}
public function Suspend($stype_id){
    
    $data = companyservice::with(['account','service.parent'])
    ->whereHas('service.parent', function($q) use($stype_id) {
        $q->where('stype_id', '=', $stype_id);
    })
  
    ->where('status' , 'suspend')->get();
    return view ('webtech.status',['data'=>$data]);
    
}

public function delete($id){
    $comp = companyservice::find($id);
    $comp->delete();
    session::flash('message','Data deleted successfully');
    return redirect()->back();
    
    return redirect()->back();
        }




}