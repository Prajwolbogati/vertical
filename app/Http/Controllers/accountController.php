<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\account;
use Carbon\Carbon;

class accountController extends Controller
{



    public function newAccount(){
    


        return view ('webtech.new-account');
        
    }

public function insertdata(Request $req)
{
$account = new account;
$account->domainname=$req->domainname;
$account->hostingquota=$req->hostingquota;
$account->fullname=$req->fullname;
$account->companyname=$req->companyname;
$account->companyaddress=$req->companyaddress;
$account->phone_num=$req->phone_num;
$account->email=$req->email;
$account->status='active';
$account->domain_vat=$req->domain_vat ? $req->domain_vat : 0;
$account->hosting_vat=$req->hosting_vat ? $req->hosting_vat : 0;
$account->marketby=$req->marketby;
$account->inputserver=$req->inputserver;
$account->detail=$req->detail;
$account->hosting_active_date=Carbon::parse($req->hosting_active_date);
$account->hosting_exp_date=Carbon::parse($req->hosting_exp_date);
$account->hosting_amount=$req->hosting_amount;
$account->hosting_finalamount=($req->hosting_amount - $req->hosting_discount) * ($req->hosting_vat/100) + ($req->hosting_amount - $req->hosting_discount);
$account->domain_finalamount=($req->domain_amount - $req->domain_discount) * ($req->domain_vat/100) + ($req->domain_amount - $req->domain_discount);
$account->hosting_discount=$req->hosting_discount ? $req->hosting_discount : 0;
$account->domain_active_date=Carbon::parse($req->domain_active_date);
$account->domain_exp_date=Carbon::parse($req->domain_exp_date);
$account->domain_amount=$req->domain_amount;
$account->domain_discount=$req->domain_discount ? $req->domain_discount : 0;
$account->save();
session::flash('message','Data inserted successfully');
return redirect()->back();



}

public function allAccount(){
    $data = account::all();

    return view ('webtech.all-account',['data'=>$data]);
    
}

public function editAccount($id){
    $singledata = account::where('account_id',$id)->first();
    if($singledata == NULL){
        return redirect('all-account');
    }
    
            return view ('webtech.edit-account',['singledata'=>$singledata]);
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
        $account->status='active';
        $account->domain_vat=$req->domain_vat ? $req->domain_vat : 0;
        $account->hosting_vat=$req->hosting_vat ? $req->hosting_vat : 0;
        $account->marketby=$req->marketby;
        $account->inputserver=$req->inputserver;
        $account->detail=$req->detail;
        $account->hosting_active_date=Carbon::parse($req->hosting_active_date);
        $account->hosting_exp_date=Carbon::parse($req->hosting_exp_date);
        $account->hosting_amount=$req->hosting_amount;
        $account->hosting_finalamount=($req->hosting_amount - $req->hosting_discount) * ($req->hosting_vat/100) + ($req->hosting_amount - $req->hosting_discount);
      $account->domain_finalamount=($req->domain_amount - $req->domain_discount) * ($req->domain_vat/100) + ($req->domain_amount - $req->domain_discount);
        $account->hosting_discount=$req->hosting_discount ? $req->hosting_discount : 0;
        $account->domain_active_date=Carbon::parse($req->domain_active_date);
        $account->domain_exp_date=Carbon::parse($req->domain_exp_date);
        $account->domain_amount=$req->domain_amount;
        $account->domain_discount=$req->domain_discount ? $req->domain_discount : 0;
        $account->save();
        session::flash('message','Data inserted successfully');
        return redirect()->back();
        
        
        
        }



        public function updateStatus(Request $req, $id)
        {
            $account = account::find($id);
           
            $account->status=$req->status;
        
        $account->save();
        session::flash('message','Data inserted successfully');
        return redirect()->back();
        
        
        
        }


}