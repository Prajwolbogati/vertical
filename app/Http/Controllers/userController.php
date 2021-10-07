<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\client;
use Carbon\Carbon;
class userController extends Controller
{
public function addUser(){
    return view ('webtech.add-user');
}
public function Forgot(){
    return view ('webtech.forgot-password');
}
}
