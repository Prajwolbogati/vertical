<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\setting;
use Carbon\Carbon;

class settingController extends Controller
{


    public function insertdata(Request $req)
    {
    $setting = new setting;
    $setting->companyname=$req->companyname;
    $setting->companyaddress=$req->companyaddress;
    $setting->companyphone=$req->companyphone;
    $setting->companyemail=$req->companyemail;
    $setting->image=$req->file('image');
   
 

      if($req->hasFile('image')){
        $setting['image'] = $this->uploadimage($setting['image']);
      
         }
    $setting['created_at'] = date('Y-m-d H:i:s');
    $setting->save();
    session::flash('message','Data inserted successfully');
    return redirect()->back();
    
    
    
    }


    public function updateData(Request $req)
    {

        $setting = setting::find($req->setting_id);
        $setting->companyname=$req->companyname;
        $setting->companyaddress=$req->companyaddress;
        $setting->companyphone=$req->companyphone;
        $setting->companyemail=$req->companyemail;
        $setting->image=$req->file('image');
       
     
    
          if($req->hasFile('image')){
            $setting['image'] = $this->uploadimage($setting['image']);
          
             }
    
     
        
        $setting['created_at'] = date('Y-m-d H:i:s');
        $setting->save();
        session::flash('message','Data updated successfully');
        return redirect()->back();




    }
    public function uploadimage($imagename){
        $name = $imagename->getClientOriginalName();
        $imagename->move(public_path().'/setting',date('ymdgis').$name);
        return date('ymdgis').$name;
    }





public function addSetting(){
    
    $data = setting::first();
   
    return view ('webtech.setting',['data'=>$data]);
}



public function settings(){
    $data = setting::first();
   
        return view ('webtech.setting',['data'=>$data]);
    }

    public function viewInvoice(){
      
       
            return view ('webtech.invoice');
        }

}
