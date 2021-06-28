<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category =category::toBase()->orderBy('id','DESC')->get();
        return view("categorylist",compact("category"))->with('message','successfully inserted');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:50|unique:categories',
             "description" =>"required"
        ]);
        $category=new category([
            "name"=>$request->post("name"),
            "description"=>$request->post("description"),
        ]);
        if ($category->save())
        {
            return redirect('category')->with(['message'=>'successfully inserted','class'=>'success']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('editCategory',compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:50',
            "description" =>"required"
        ]);
        $category->update([
            "name"=>$request->post('name'),
            "description"=>$request->post('description')
        ]);
        return redirect('category')->with(['message'=>'successfully Update','class'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('category')->with('message','Delete Successfully');
    }
}
