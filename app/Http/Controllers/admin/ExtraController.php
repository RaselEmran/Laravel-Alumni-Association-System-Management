<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Alumni;
use App\Student;
use App\Messege;
use App\Depertment;
use App\Contact;
use Auth;

class ExtraController extends Controller
{
    public function index()
    {
      if (!auth()->user()->can('apply.view')) {
        abort(403, 'Unauthorized action.');
      }
     $alumni =Alumni::all()->pluck('title', 'id')->prepend(_lang('Select One'), '');
     return view('admin.student.index',compact('alumni'));
    }

    public function list(Request $request)
    {
    	if ($request->ajax()) {
    		$alumni =$request->alumni;
    		$student =Student::where('alumni_id',$alumni)->get();
    		return view('admin.student.list',compact('student'));
    	}
    }

    public function list_details($id)
    {
      $student =Student::find($id);
      return view('admin.student.details',compact('student'));
    }

    public function check_details($id)
    {
     if (!auth()->user()->can('apply.view')) {
        abort(403, 'Unauthorized action.');
      }
      $student =User::find($id);
      return view('admin.student.check',compact('student')); 
    }

    public function check_roll(Request $request)
    {
     if (!auth()->user()->can('apply.view')) {
        abort(403, 'Unauthorized action.');
      }
      
      $check =Depertment::where('roll_no',$request->roll)->first();
      $id =$request->id;
      return view('admin.student.roll',compact('check','id'));
    }

    public function messege()
    {
       if (!auth()->user()->can('messege.view' ) && !auth()->user()->hasRole('Member')){
         abort(403, 'Unauthorized action.');
       }
     $id =Auth::user()->id;
     $send =Messege::orderBy('id','DESC')->where('sender_id',$id)->get();
     $receiver =Messege::orderBy('id','DESC')->where('receiver_id',$id)->orWhere('type','All')->get();
     return view('admin.messege.messege',compact('send','receiver'));
    }

    public function messege_create(Request $request)
    {
      if (auth()->user()->can('messege.create' ) && auth()->user()->hasRole('Member')){
         abort(403, 'Unauthorized action.');
       }
     if ($request->ajax()) {
         $alumni =Alumni::all()->pluck('title', 'id')->prepend(_lang('Select One'), '');
         $user =User::all()->except(Auth::user()->id)->pluck('email', 'id')->prepend(_lang('Select One'), '');
         if (auth()->user()->hasRole('Member')) {
             return view('member.messege',compact('user'));
         }
         else
         {
         return view('admin.messege.text',compact('alumni'));
         }
      } 
    }

    public function messege_send(Request $request)
    {
         if (!auth()->user()->can('messege.create' ) && !auth()->user()->hasRole('Member')){
         abort(403, 'Unauthorized action.');
       }
         $validator = $request->validate([
                'alumni_id' => 'required', 'integer',
                'type' => 'required', 'max:255',
                'messege' => 'required', 'max:216',
            ]);

         if($request->input('type') != ""){

            if($request->input('type') == "All"){
              
              $student =Student::where('alumni_id',$request->alumni_id)->get();
              foreach ($student as $key => $all) {
                 $messege =new Messege;
                 $messege->sender_id =Auth::user()->id;
                 $messege->receiver_id =$all->user_id;
                 $messege->subject =$request->subject;
                 $messege->messege =$request->messege;
                 $messege->phone =$all->user->phone;
                 $messege->status ='Unread';
                 $messege->save();
              }
            }

            else
            {
                foreach ($request->member as $key => $value) {

                 $student =Student::where('user_id',$request->member[$key])->first();  
                 $messege =new Messege;
                 $messege->sender_id =Auth::user()->id;
                 $messege->receiver_id =$request->member[$key];
                 $messege->subject =$request->subject;
                 $messege->messege =$request->messege;
                 $messege->phone =$student->user->phone;
                 $messege->status ='Unread';
                 $messege->save();
                }
            }
         }

            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Messege Send')]);
    }


    public function messege_view(Request $request,$id,$slug)
    {
      $messege =Messege::find($id);
      return view('admin.messege.view',compact('messege','slug'));
    }


    public function contact()
    {
      $model =Contact::orderBy('id','DESC')->get();
      return view('admin.contact.contact',compact('model'));
    }
 
    public function member_list(Request $request)
    {
      if ($request->ajax()) {
         $alumni_id =$request->alumni_id;
         $student =Student::where('alumni_id',$alumni_id)->get();

     $html ='';
     foreach ($student as $key => $value) {
         $html.='<option value="'.$value->user_id.'">'.$value->user->first_name.'</option>';
       }

       return $html;
      }  
    }

}
