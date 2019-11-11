<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!auth()->user()->can('category.view')) {
        abort(403, 'Unauthorized action.');
    }
    $model =Category::all();
    return view('admin.category.index',compact('model'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!auth()->user()->can('category.create')) {
        abort(403, 'Unauthorized action.');
    }

    return view('admin.category.form');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'name' => 'required', 'max:255',
            'description' => 'nullable', 'max:255',
        ]);
        $category=new Category;
        $category->name =$request->name;
        $category->description =$request->description;
        $category->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Created'), 'goto' => route('admin.category.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('category.update')) {
            abort(403, 'Unauthorized action.');
        }
        $model =Category::find($id);
        return view('admin.category.form',compact('model'));
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
        if (!auth()->user()->can('category.update')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'name' => 'required', 'max:255',
            'description' => 'nullable', 'max:255',
        ]);
        $category=Category::find($id);
        $category->name =$request->name;
        $category->description =$request->description;
        $category->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Updated'), 'goto' => route('admin.category.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if (!auth()->user()->can('category.delete')) {
            abort(403, 'Unauthorized action.');
        }

        if (request()->ajax()) {

            $category = Category::find($id);
            $category->delete();
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Deleted'),'load'=>'return']);
        }
    }
}
