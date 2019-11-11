<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Alumni;
use App\Student;
use App\Messege;
use Auth;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
   public function profile()
   {
    if (!auth()->user()->hasRole('Member')) {
      abort(403, 'Unauthorized action.');
    }
     $id =Auth::user()->id;
     $user =User::find($id);
     return view('member.profile',compact('user'));
   }

   public function profile_post(Request $request)
   {
    if (!auth()->user()->hasRole('Member')) {
      abort(403, 'Unauthorized action.');
     }
   	    $validator = $request->validate([
                'surname' => 'required', 'max:255',
                'first_name' => 'required', 'max:255',
                'last_name' => 'required', 'max:255',
                'phone'=>'required',
                'designation'=>'required',
                'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            ]); 

              $user =User::find($request->id);
               if ($request->hasFile('image')) {
			      $storagepath = $request->file('image')->store('public/student');
			      $fileName = basename($storagepath);
			      $user->image = $fileName;

			        //if file chnage then delete old one
			      $oldFile = $request->get('oldimage', '');
			      if ($oldFile != '') {
			        $file_path = "public/student" . $oldFile;
			        Storage::delete($file_path);
			    }
			}
			else {
			  $user->image = $request->get('oldimage', '');
			}

           if ($request->hasFile('banner')) {
            $storagepath = $request->file('banner')->store('public/student/banner');
            $fileName = basename($storagepath);
            $user->banner = $fileName;

              //if file chnage then delete old one
            $oldFile = $request->get('oldbanner', '');
            if ($oldFile != '') {
              $file_path = "public/student/banner" . $oldFile;
              Storage::delete($file_path);
          }
      }
      else {
        $user->banner = $request->get('oldbanner', '');
      }
            $user->surname = $request->surname;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->save();
            $student =Student::where('user_id',$request->id)->first();
            $student->designation =$request->designation;
            $student->occupation =$request->occupation;
            $student->address =$request->address;
            $student->save();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Profile Updated'), 'goto' => route('admin.member.profile')]);
   }


   public function schedule()
   {
    if (!auth()->user()->hasRole('Member')) {
      abort(403, 'Unauthorized action.');
    }
   	$model =Student::where('user_id',Auth::user()->id)->first();
   	$alumni =Alumni::where('status',true)->first();
   	return view('member.schedule',compact('model','alumni'));
   }

   public function messege(Request $request)
   {
    if (!auth()->user()->hasRole('Member')) {
      abort(403, 'Unauthorized action.');
    }
   	  $validator = $request->validate([
                'user_id' => 'required', 'integer',
                'subject' => 'required', 'max:255',
                'messege' => 'required', 'max:216',
            ]);
   	  $user =User::find($request->user_id);
   	   $messege =new Messege;
   	   $messege->sender_id =Auth::user()->id;
       $messege->receiver_id =$request->user_id;
       $messege->subject =$request->subject;
       $messege->messege =$request->messege;
       $messege->phone =$user->phone;
       $messege->status ='Unread';
       $messege->save();
       return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Messege Send')]);
   }
}
