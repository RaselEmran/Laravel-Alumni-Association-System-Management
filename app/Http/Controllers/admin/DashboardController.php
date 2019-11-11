<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Alumni;
use App\Student;
use App\Depertment;
use App\Session;
use App\Messege;
use App\EmailLog;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
	    $id =Auth::user()->id;
	    $receiver =Messege::orderBy('id','DESC')->where('receiver_id',$id)->orWhere('type','All')->get();
	     $inbox =EmailLog::orderBy('id','DESC')->where('reciver_id',$id)->orWhere('type','Mail')->get();
	     return view('home',compact('receiver','inbox'));
    }
}
