<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!auth()->user()->can('gallery.view' ) && !auth()->user()->hasRole('Member')){
         abort(403, 'Unauthorized action.');
       }
    $model =Gallery::all();
    return view('admin.gallery.index',compact('model'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!auth()->user()->can('gallery.create')) {
        abort(403, 'Unauthorized action.');
    }
    return view('admin.gallery.form');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!auth()->user()->can('gallery.create')) {
        abort(403, 'Unauthorized action.');
    }
    $validator = $request->validate([
        'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
    ]);

    $gallery =new Gallery;
    if($request->hasFile('image')) {
      $storagepath = $request->file('image')->store('public/gallery');
      $fileName = basename($storagepath);
      $gallery->image = $fileName;
  }
  $gallery->save();

  return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Gallery Created'), 'goto' => route('admin.gallery.index')]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      if (!auth()->user()->can('gallery.delete')) {
        abort(403, 'Unauthorized action.');
    }
    if ($request->ajax()) {
        $gallery = Gallery::find($id);
        unlink('storage/gallery/'.$gallery->image);
        $gallery->delete();
        if ($gallery) {
            return response()->json(['success' => true, 'status' => 'success', 'message' => 'Gallery Information Delete Successfully.','load'=>true]);
        }
    }
}
}
