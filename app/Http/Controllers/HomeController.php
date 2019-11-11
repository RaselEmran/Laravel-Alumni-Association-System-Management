<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\About;
use App\Slider;
use App\Team;
use App\Schedule;
use App\Alumni;
use App\Gallery;
use App\Contact;
use App\Session;
use App\Batch;
use App\User;
use App\Student;
use App\Subscribe;
use App\Depertment;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider =Slider::all();
        $team =Team::orderBy('created_at','desc')->take(4)->get();
        $gallery =Gallery::orderBy('created_at','desc')->take(4)->get();
        $about =About::first();
        $alumni =Alumni::where('status',true)->first();
        return view('welcome',compact(
            'slider',
            'team',
            'gallery',
            'about',
            'alumni'
        ));
    }

    public function contact(Request $request)
    {
         $validator = $request->validate([
                'name' => 'required', 'max:255',
                'email' => 'required', 'email',
                'subject' => 'required', 'max:255',
                'message' => 'nullable',
            ]);
         $contact =new Contact;
         $contact->name =$request->name;
         $contact->email =$request->email;
         $contact->subject =$request->subject;
         $contact->message =$request->message;
         $contact->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Thank You For Contacting Us'), 'load' => true]);
    }

    public function show_register()
    {
        $session =Session::all()->pluck('year', 'id')->prepend(_lang('Select One'), '');
        $batch =Batch::all()->pluck('year', 'id')->prepend(_lang('Select One'), '');
        $alumni =Alumni::where('status',true)->first();
        return view('auth.register',compact('session','batch','alumni'));
    }

    public function registration(Request $request)
    {
          $validator = $request->validate([
                'surname' => 'required', 'max:255',
                'first_name' => 'required', 'max:255',
                'last_name' => 'required', 'max:255',
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'phone'=>'required',
                'designation'=>'required',
                'batch_id'=>'required|integer',
                'session_id'=>'required|integer',
                'roll_no'=>'required|integer',
                'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            ]); 

          $check =Depertment::where('roll_no',$request->roll_no)->first();
          if ($check !==$request->roll_no) {
              return response()->json(['success' => true, 'status' => 'danger', 'message' => _lang('Yor Roll Number Dont Match Our Record')]);
          }

          $user =new User;
        if($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/student');
          $fileName = basename($storagepath);
          $user->image = $fileName;
           }
            $user->surname = $request->surname;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->status = 'activated';
            $user->save();
            $role = Role::findOrFail(2);
            $user->assignRole($role->name);

            $student =new Student;
            $student->user_id =$user->id;
            $student->batch_id =$request->batch_id;
            $student->session_id =$request->session_id;
            $student->alumni_id =$request->alumni_id;
            $student->designation =$request->designation;
            $student->occupation =$request->occupation;
            $student->address =$request->address;
            $student->save();
            Auth::login($user);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Thank You For Registration'), 'goto' => route('admin.home')]);


    }


  public function subscribe(Request $request)
  {
    if ($request->ajax()) {
        $validator = $request->validate([
            'sub_email' => ['required', 'string', 'email', 'max:255', 'unique:subscribes'],
        ]);

        $subs =new Subscribe;
        $subs->sub_email=$request->sub_email;
        $subs->save();
         return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Thank For Subscibe')]);

    }
  }
  }
