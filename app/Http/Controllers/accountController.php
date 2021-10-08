<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use View;
use App\Models\account;
use App\Models\companyservice;
use App\Models\service;
use App\Models\servicetype;
use Carbon\Carbon;
use Response;
class accountController extends Controller
{
    public function newAccount(){
        return view ('webtech.new-account');
    }
    // public function Login(){
    //     return view ('webtech.login');
    // }
    public function index(){
        $data = companyservice::with('account','service.parent')    
        ->whereRaw('DATEDIFF(exp_date,now())<=7')-> orderBy('account_id', 'asc')->get();
        $seven = companyservice::with('account','service.parent')    
        ->whereRaw('DATEDIFF(exp_date,now())<=7')-> orderBy('account_id', 'asc')->count();
        $fifteen = companyservice::with('account','service.parent')    
        ->whereRaw('DATEDIFF(exp_date,now())<=15')-> orderBy('account_id', 'asc')->count();
        $expired = companyservice::with('account','service.parent')
        ->where('status' , 'expired')-> orderBy('account_id', 'asc')->count();
        $suspend = companyservice::with('account','service.parent') 
        ->where('status' , 'suspend')-> orderBy('account_id', 'asc')->count();
        $delete = companyservice::with('account','service.parent')
        ->where('status' , 'delete')-> orderBy('account_id', 'asc')->count();
        return view ('index',[
            'data'=>$data,
            'seven'=>$seven,
            'fifteen'=>$fifteen,
            'expired'=>$expired,
            'suspend'=>$suspend,
            'delete'=>$delete,
        ]);
    }
public function insertdata(Request $req)
{
    $req->validate([
        'domainname' => 'required|string|max:255|unique:accounts',
        'fullname' => 'required|string|max:255',
        'hostingquota' => 'string|nullable|max:255',
        'companyname' => 'required|string|max:255',
        'companyaddress' => 'required|string|max:255',
        'phone_num' => 'required|string|max:255',
        'marketby' => 'string|nullable|max:255',
        'detail' => 'string',
        'email' => 'required|string|email|max:255|unique:accounts',
    ]);
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

    // $req->validate([
       
    //     'status.*' => 'required|string|max:255',
    //     'service_id.*' => 'nullable',
    //     'vat_amount.*' => 'required|numeric|max:255',
    //     'active_date.*'      => 'required|date|date_format:Y-m-d|after:yesterday',
    //     'exp_date.*'        => 'required|date|date_format:Y-m-d|after:start_at',
    //     'amount.*' => 'required|numeric|gt:0',
    //     'discount.*' => 'numeric|nullable|gt:0',
       
    // ]);
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

            $req->validate([
                'domainname' => 'required|string|max:255',
                'fullname' => 'required|string|max:255',
                'hostingquota' => 'string|nullable|max:255',
                'companyname' => 'required|string|max:255',
                'companyaddress' => 'required|string|max:255',
                'phone_num' => 'required|string|max:255',
                'marketby' => 'string|nullable|max:255',
                'detail' => 'string',
                'email' => 'required|string|email|max:255',
            ]);
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
        return Response::json($comp);
        // return response()->json(['success'=>'Article updated successfully']);
        // session::flash('message','Data updated successfully');
        }
        public function delete($id){
            $comp = companyservice::find($id);
            $comp->delete();
            session::flash('message','Data deleted successfully');
                }
        public function Exp15(){
            $data = companyservice::with('account','service.parent')
            ->whereRaw('DATEDIFF(exp_date,now())<=15')-> orderBy('account_id', 'asc')->get();
            return view ('webtech.accountview',['data'=>$data]);
        }
        public function Exp7(){
            $data = companyservice::with('account','service.parent')
            ->whereRaw('DATEDIFF(exp_date,now())<=7')-> orderBy('account_id', 'asc')->get();
            return view ('webtech.accountview',['data'=>$data]);
        }
        public function Expired(){
            $data = companyservice::with('account','service.parent')
            ->where('status' , 'expired')-> orderBy('account_id', 'asc')->get();
            return view ('webtech.accountview',['data'=>$data]);
        }
        public function Deleted(){
            $data = companyservice::with('account','service.parent')
            ->where('status' , 'delete')-> orderBy('account_id', 'asc')->get();
            return view ('webtech.deleteaccount',['data'=>$data]);
        }
        public function Suspend(){
            $data = companyservice::with('account','service.parent')
            ->where('status' , 'suspend')-> orderBy('account_id', 'asc')->get();
            return view ('webtech.accountview',['data'=>$data]);
        }
}