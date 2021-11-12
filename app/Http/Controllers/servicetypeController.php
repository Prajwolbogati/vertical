<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\servicetype;
use Carbon\Carbon;
class servicetypeController extends Controller
{
    public function insertdata(Request $req)
    {
        $req->validate([
            'stype_name' => 'required|string|max:255',
          
        ]);
    $servicetype = new servicetype;
    $servicetype->stype_name=$req->stype_name;
    $servicetype['created_at'] = date('Y-m-d H:i:s');
    $servicetype->save();
    session::flash('messages','Data inserted successfully');
    return redirect()->back();
    }
    public function updateData(Request $req)
{
    $req->validate([
        'stype_name' => 'required|string|max:255',
      
    ]);
    $service = servicetype::find($req->stype_id);
$service->stype_name=$req->stype_name;
    $service['updated_at'] = date('Y-m-d H:i:s');
    $service->save();
    session::flash('mess','Data updated successfully');
    return redirect()->back();
}
    public function addService(){
    $data = servicetype::get();
        return view ('webtech.add-service',['data'=>$data]);
    }
    public function editServiceType($id){
        $data =  servicetype::where('stype_id',$id)->first();
                return view ('webtech.edit-servicetype',['data'=>$data]);
            }
            public function deleteStype($id){
                $stype = servicetype::find($id);
                $stype->delete();
                session::flash('message','Data deleted successfully');
                // return redirect()->back();
                    }
}
