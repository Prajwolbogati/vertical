<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\account;
use App\Models\companyservice;
use App\Models\service;
use App\Models\servicetype;
use Carbon\Carbon;

class accountController extends Controller
{

//  public function _construct(){
//     $services = service::with('child')->whereNull('service_id')->get();
      
//         view()->share([
//             'services'=>$services
       
          

//        ]);
//    }
    

    public function newAccount(){
       

        return view ('webtech.new-account');
        
    }


    public function index(){
       
        return view ('index');
    }

public function insertdata(Request $req)
{
$account = new account();
$account->domainname=$req->domainname;
$account->hostingquota=$req->hostingquota;
$account->fullname=$req->fullname;
$account->companyname=$req->companyname;
$account->companyaddress=$req->companyaddress;
$account->phone_num=$req->phone_num;
$account->email=$req->email;
$account->marketby=$req->marketby;
$account->detail=$req->detail;
$account->save();



foreach($req->service_id as $key=>$service_id){
if($service_id){
$companyservice = new companyservice();
$companyservice->status='active';

$companyservice->vat_amount= "13";
$companyservice->service_id= $service_id;
$companyservice->account_id=$account->account_id;
$companyservice->active_date=Carbon::parse($req->active_date[$key]);
$companyservice->exp_date=Carbon::parse($req->exp_date[$key]);
$companyservice->amount=$req->amount[$key];
$companyservice->amountafterdiscount=($req->amount[$key] - $req->discount[$key]);
$companyservice->finalamount=($req->amount[$key] - $req->discount[$key]) * (13/100) + ($req->amount[$key] - $req->discount[$key]);
$companyservice->discount=$req->discount[$key] ? $req->discount[$key] : 0;
$companyservice->save();
}
}


session::flash('message','Data inserted successfully');
return redirect()->back();



}

public function allAccount(){
    $data = account::with(['compservice.service.parent'])->get();

    $datass = companyservice::with(['account','service.parent']) -> orderBy('account_id', 'asc')->get();

    return view ('webtech.all-account',['data'=>$data,'datass'=>$datass]);
    
}


public function detailAccount($id){
    $data = companyservice::with('account','service.parent')->where('account_id',$id)->get();
    if($data == NULL){
        return redirect('all-account');
    }
    $sum = companyservice::with('account','service.parent')->where('account_id',$id)->sum('finalamount');
    return view ('webtech.detail',['data'=>$data,'sum'=>$sum]);
    
}

public function editAccount($id){
    $singledata = account::with('compservice.service.parent')->where('account_id',$id)->first();
    if($singledata == NULL){
        return redirect('all-account');
    }
    $data = servicetype::with('child')->get();
            return view ('webtech.edit-account',['singledata'=>$singledata,'data'=>$data]);
        }

        public function updateData(Request $req)
        {
    
            $account = account::find($req->account_id);
            $account->domainname=$req->domainname;
            $account->hostingquota=$req->hostingquota;
            $account->fullname=$req->fullname;
            $account->companyname=$req->companyname;
            $account->companyaddress=$req->companyaddress;
            $account->phone_num=$req->phone_num;
            $account->email=$req->email;
            $account->marketby=$req->marketby;
            $account->detail=$req->detail;
            $account->save();


       
            foreach($req->service_id as $key=>$service_id){
                if($service_id){
                  
                   
if(isSet($req->compservice_id[$key])){

    $companyservice = companyservice::find($req->compservice_id[$key]);
                    
    $companyservice->status='active';
    
    $companyservice->vat_amount= "13";
    $companyservice->service_id= $service_id;
    $companyservice->account_id=$account->account_id;
    $companyservice->active_date=Carbon::parse($req->active_date[$key]);
    $companyservice->exp_date=Carbon::parse($req->exp_date[$key]);
    $companyservice->amount=$req->amount[$key];
    $companyservice->amountafterdiscount=($req->amount[$key] - $req->discount[$key]);
    $companyservice->finalamount=($req->amount[$key] - $req->discount[$key]) * (13/100) + ($req->amount[$key] - $req->discount[$key]);
    $companyservice->discount=$req->discount[$key] ? $req->discount[$key] : 0;
  
              
               
}else{

 
 
    $companyservice = new companyservice();
    $companyservice->status='active';
    
    $companyservice->vat_amount= "13";
    $companyservice->service_id= $service_id;
    $companyservice->account_id=$account->account_id;
    $companyservice->active_date=Carbon::parse($req->active_date[$key]);
    $companyservice->exp_date=Carbon::parse($req->exp_date[$key]);
    $companyservice->amount=$req->amount[$key];
    $companyservice->amountafterdiscount=($req->amount[$key] - $req->discount[$key]);
    $companyservice->finalamount=($req->amount[$key] - $req->discount[$key]) * (13/100) + ($req->amount[$key] - $req->discount[$key]);
    $companyservice->discount=$req->discount[$key] ? $req->discount[$key] : 0;
    

}
$companyservice->save();

                }
                }    
                        
                      
        session::flash('message','Data updated successfully');
        return redirect()->back();
        
        
        
        }



        public function updateStatus(Request $req, $id)
        {
            $comp = companyservice::find($id);
           
            $comp->status=$req->status;
        
        $comp->save();
        session::flash('message','Data inserted successfully');
        return redirect()->back();
        
        
        
        }


        public function Exp15(){
            $data = companyservice::with('account','service.parent')
            ->whereRaw('DATEDIFF(exp_date,now())<=15')->get();
           
            return view ('webtech.accountview',['data'=>$data]);
            
        }
        
        public function Exp7(){
            $data = companyservice::with('account','service.parent')
           
            ->whereRaw('DATEDIFF(exp_date,now())<=7')->get();
        
            return view ('webtech.accountview',['data'=>$data]);
            
        }
        public function Expired(){
            
            $data = companyservice::with('account','service.parent')
            
            
            
            ->where('status' , 'expired')->get();
        
            return view ('webtech.accountview',['data'=>$data]);
            
        }
        public function Deleted(){
            $data = companyservice::with('account','service.parent')
           
            
            ->where('status' , 'delete')->get();
            
           
        
            return view ('webtech.accountview',['data'=>$data]);
            
        }
        public function Suspend(){
            
            $data = companyservice::with('account','service.parent')
            
          
            ->where('status' , 'suspend')->get();
            return view ('webtech.accountview',['data'=>$data]);
            
        }
        
        


}