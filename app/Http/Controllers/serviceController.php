<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\service;
use App\Models\servicetype;

class serviceController extends Controller
{

public function insertdata(Request $req)
{
$service = new service;
$service->stype_id=$req->stype_id;
$service->service_name=$req->service_name;

$service['created_at'] = date('Y-m-d H:i:s');
$service->save();
session::flash('message','Data inserted successfully');
return redirect()->back();



}


public function updateData(Request $req)
{

    $service = service::find($req->service_id);
    $service->stype_id=$req->stype_id;
$service->service_name=$req->service_name;
 
    
    $service['updated_at'] = date('Y-m-d H:i:s');
    $service->save();
    session::flash('message','Data updated successfully');
    return redirect()->back();




}


public function allService(){
    $data =  service::with('parent')->get();

    return view ('webtech.all-service',['data'=>$data]);
    
}

public function editService($id){
    $data =  servicetype::get();
    $singledata = service::with('parent')->where('service_id',$id)->first();
    if($singledata == NULL){
        return redirect('all-service');
    }
    
            return view ('webtech.edit-service',['singledata'=>$singledata,'data'=>$data]);
        }

}