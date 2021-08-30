<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\client;
use Carbon\Carbon;

class clientController extends Controller
{

    public function insertdata(Request $req)
    {
    $client = new client;
    $client->clientname=$req->clientname;
    $client->clientemail=$req->clientemail;
    $client->clientphone=$req->clientphone;
    $client->clientaddress=$req->clientaddress;
    $client->requirement=$req->requirement;
    $client->clientactive_date=Carbon::parse($req->clientactive_date);
    $client->clientstatus=$req->clientstatus;
 
    
    $client['created_at'] = date('Y-m-d H:i:s');
    $client->save();
    session::flash('message','Data inserted successfully');
    return redirect()->back();
    
    
    
    }

    public function updateData(Request $req)
    {

        $client = client::find($req->client_id);
        $client->clientname=$req->clientname;
        $client->clientemail=$req->clientemail;
        $client->clientphone=$req->clientphone;
        $client->clientaddress=$req->clientaddress;
        $client->requirement=$req->requirement;
        $client->clientactive_date=Carbon::parse($req->clientactive_date);
        $client->clientstatus=$req->clientstatus;
     
        
        $client['created_at'] = date('Y-m-d H:i:s');
        $client->save();
        session::flash('message','Data updated successfully');
        return redirect()->back();




    }





public function addClient(){
    


    return view ('webtech.add-new-client');
    
}

public function allClient(){
    $data = client::get();

    return view ('webtech.all-client',['data'=>$data]);
    
}

public function editClient($id){
    $singledata = client::where('client_id',$id)->first();
    if($singledata == NULL){
        return redirect('all-client');
    }
    
            return view ('webtech.edit-client',['singledata'=>$singledata]);
        }


        public function updateclientStatus(Request $req, $id)
        {
            $comp = client::find($id);
           
            $comp->clientstatus=$req->clientstatus;
        
        $comp->save();
        session::flash('message','Data updated successfully');
        return redirect()->back();
        
        
        
        }


        public function deleteClient($id){
            $client = client::find($id);
            $client->delete();
            session::flash('message','Data deleted successfully');
            return redirect()->back();
            
            return redirect()->back();
                }
        
        
               
}
