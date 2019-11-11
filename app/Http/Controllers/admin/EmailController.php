<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Alumni;
use App\Student;
use App\EmailLog;
use Auth;
use App\Notifications\Mailmessege;

class EmailController extends Controller
{
 public function index()
 {

  $id =Auth::user()->id;
  $send =EmailLog::orderBy('id','DESC')->where('sender_id',$id)->orWhere('type','Mail')->get();
  $inbox =EmailLog::orderBy('id','DESC')->where('reciver_id',$id)->orWhere('type','Mail')->get();
  return view('admin.mail.index',compact('send','inbox'));
}

public function mail_create(Request $request)
{
  $id =Auth::user()->id;
  $user =User::all()->except($id)->pluck('email', 'id')->prepend(_lang('Select One'), '');
  return view('admin.mail.create',compact('user'));
}

public function mail_post(Request $request)
{
  if (!auth()->user()->hasAnyPermission('mail.create' )|| !auth()->user()->hasRole('Member')){
    abort(403, 'Unauthorized action.');
  }
  $validator = $request->validate([
    'user_id' => 'required', 'integer',
    'subject' => 'required', 'max:255',
    'messege' => 'required',
  ]);

  $user =User::find($request->user_id);
  $subject =$request->subject;
  $messege =$request->messege;
  if ($user->email) {
    $user->notify(new Mailmessege($user,$subject,$messege));
  }
  $id =Auth::user()->id;

  $log = new EmailLog;
  $log->sender_id =$id;
  $log->reciver_id =$request->user_id;
  $log->subject =$request->subject;
  $log->messege =$request->messege;
  $log->type ='Mail';
  $log->save();

  return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Email Send Successfully')]);


}

public function invitation()
{
 if (!auth()->user()->can('invitation.view')) {
  abort(403, 'Unauthorized action.');
}
$id =Auth::user()->id;
$send =EmailLog::orderBy('id','DESC')->where('sender_id',$id)->where('type','invite')->get();
return view('admin.mail.invitation',compact('send'));
}

public function invite_mail()
{
  if (!auth()->user()->can('invitation.create')) {
    abort(403, 'Unauthorized action.');
  }
  $alumni =Alumni::all()->pluck('title', 'id')->prepend(_lang('Select One'), '');
  return view('admin.mail.invite_mail',compact('alumni'));
}

public function invitation_send(Request $request)
{
 if (!auth()->user()->can('invitation.create')) {
  abort(403, 'Unauthorized action.');
}
$validator = $request->validate([
  'alumni_id' => 'required', 'integer',
  'type' => 'required', 'max:255',
  'messege' => 'required', 'max:216',
]);
$subject =$request->subject;
$messege =$request->messege;
if($request->input('type') != ""){

  if($request->input('type') == "All"){
    
    $student =Student::where('alumni_id',$request->alumni_id)->get();
    foreach ($student as $key => $all) {
     if ($all->user->email) {
       $all->user->notify(new Mailmessege($all->user,$subject,$messege));
     }
     $log =new EmailLog;
     $log->sender_id =Auth::user()->id;
     $log->reciver_id =$all->user_id;
     $log->subject =$request->subject;
     $log->messege =$request->messege;
     $log->type ='Mail';

     $log->save();
   }
 }

 else
 {
  foreach ($request->member as $key => $value) {

   $student =Student::where('user_id',$request->member[$key])->first();  
   if ($student->user->email) {
     $student->user->notify(new Mailmessege($student->user,$subject,$messege));
   }
   $log =new EmailLog;
   $log->sender_id =Auth::user()->id;
   $log->reciver_id =$request->member[$key];
   $log->subject =$request->subject;
   $log->messege =$request->messege;
   $log->type ='Mail';
   $log->save();
 }
}
}

return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Invitation Send')]);
}
}
