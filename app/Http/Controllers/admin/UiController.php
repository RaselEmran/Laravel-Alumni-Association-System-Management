<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\User;
use App\About;
use Validator;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UiController extends Controller
{
   public function index()
   {
   	$id =Auth::user()->id;
   	$user =User::findOrFail($id);
    return view('admin.user.profile',compact('user'));
   }

    public function postprofile(Request $request)
   {
    if (!auth()->user()->hasRole('Member')) {
        abort(403, 'Unauthorized action.');
        }
   	  if ($request->ajax()) {
			$validator = Validator::make($request->all(),[
				'first_name' => ['sometimes', 'nullable','string'],
				'last_name' => ['sometimes', 'nullable','string'],
        'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
			]);
			$id =Auth::user()->id;
      $model =User::findOrFail($id);
      if ($request->hasFile('image')) {
            $storagepath = $request->file('image')->store('public/student');
            $fileName = basename($storagepath);
            $model->image = $fileName;

              //if file chnage then delete old one
            $oldFile = $request->get('oldimage', '');
            if ($oldFile != '') {
              $file_path = "public/student" . $oldFile;
              Storage::delete($file_path);
          }
      }
      else {
        $model->image = $request->get('oldimage', '');
      }

     if ($request->hasFile('banner')) {
            $storagepath = $request->file('banner')->store('public/student/banner');
            $fileName = basename($storagepath);
            $model->banner = $fileName;

              //if file chnage then delete old one
            $oldFile = $request->get('oldbanner', '');
            if ($oldFile != '') {
              $file_path = "public/student/banner" . $oldFile;
              Storage::delete($file_path);
          }
      }
      else {
        $model->banner = $request->get('oldbanner', '');
      }
			$model->surname =$request->surname;
			$model->first_name =$request->first_name;
			$model->last_name =$request->last_name;
			$model->name =$request->name;
			$model->phone =$request->phone;
			$model->save();
			return response()->json(['message' => _lang('Profile Update.')]);
		}
   }

public function password_change(Request $request)
   {
   if ($request->ajax()) {
			$validator = $request->validate([
		     'password' => ['required', 'string', 'min:6', 'confirmed'],
			]);

			$id =Auth::user()->id;
        	$model =User::findOrFail($id);
        	$model->password=Hash::make($request->password);
        	$model->save();
        	return response()->json(['message' => _lang('Password Change.')]);
		}
	}


	public function about(Request $request)
	{
    if (!auth()->user()->can('abount.create')) {
        abort(403, 'Unauthorized action.');
        }

		if ($request->isMethod('get')) {
			$model = About::first();
			return view('admin.setting.about',compact('model'));
		}

		else
		{
		$validator = $request->validate([
          'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
          'content' => 'required',
        ]);

           if($request->hasFile('image')) {
            $storagepath = $request->file('image')->store('public/about');
            $fileName = basename($storagepath);
            $image = $fileName;

            //if file chnage then delete old one
            $oldFile = $request->get('old_image','');
            if( $oldFile != ''){
                $file_path = "public/about/".$oldFile;
                Storage::delete($file_path);
            }
            }
            else{
                $image = $request->get('old_image','');
            }

            $content=$request->content;

             About::updateOrCreate(
                ['image' => $image],
                ['content' => $content]
            );

             return response()->json(['message' => _lang('Update.')]);
		}
	}
}
