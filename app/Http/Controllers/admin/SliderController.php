<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('slider.view')) {
        abort(403, 'Unauthorized action.');
        }
      $model =Slider::all();
      return view('admin.slider.index',compact('model'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!auth()->user()->can('slider.create')) {
        abort(403, 'Unauthorized action.');
        }
        return view('admin.slider.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('slider.create')) {
        abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $slider =new Slider;
        if($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/slider');
          $fileName = basename($storagepath);
          $slider->image = $fileName;
      }
      $slider->title =$request->title;
      $slider->save();

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Created'), 'goto' => route('admin.slider.index')]);
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     if (!auth()->user()->can('slider.update')) {
        abort(403, 'Unauthorized action.');
        }
        $model =Slider::find($id);
        return view('admin.slider.form',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     if (!auth()->user()->can('slider.update')) {
        abort(403, 'Unauthorized action.');
        }
     $validator = $request->validate([
        'title' => ['required', 'max:255'],
        'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
    ]);

     $slider =Slider::findOrfail($id);

     if ($request->hasFile('image')) {
      $storagepath = $request->file('image')->store('public/slider');
      $fileName = basename($storagepath);
      $slider->image = $fileName;

        //if file chnage then delete old one
      $oldFile = $request->get('oldimage', '');
      if ($oldFile != '') {
        $file_path = "public/slider" . $oldFile;
        Storage::delete($file_path);
    }
}
else {
  $slider->image = $request->get('oldimage', '');
}

$slider->title =$request->title;
$slider->save();

return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Updated'), 'goto' => route('admin.slider.index')]);

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
     if (!auth()->user()->can('slider.delete')) {
        abort(403, 'Unauthorized action.');
        }
      if ($request->ajax()) {
        $slider = Slider::find($id);
        unlink('storage/slider/'.$slider->image);
        $slider->delete();
        if ($slider) {
            return response()->json(['success' => true, 'status' => 'success', 'message' => 'Slider Information Delete Successfully.','load'=>true]);
     }
 }
}
}
