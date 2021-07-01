<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Resources\User;

class BlogController extends Controller
{
    // public function __construct()
    // {
    //      $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///  join start
        $blog = category::select('blogs.id','blogs.name','blogs.image','blogs.description','categories.name as c_name')->join('blogs','blogs.cat_id','=','categories.id')->get();
        // dd($data);
        return view("bloglist",compact("blog"))->with('message','successfully inserted');

        ///  join end
        
        //  dd(Blog::find(5)->category->name); working fine

        // $blog =Blog::toBase()->orderBy('id','DESC')->get();
        // $absentData = User::collection($blog);
        // dd($absentData);
        // return view("bloglist",compact("blog"))->with('message','successfully inserted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =category::toBase()->get();
        return view("blog",compact("category"));
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
            'name'=> 'required|string|min:3|max:50',
            'category'=> 'required',
            'image'=> 'required|file|image|mimes:jpeg,png,jpg',
            "description" =>"required"
        ]);
        $image=$request->file('image');
		$ext=$image->extension();
		$file=time().'.'.$ext;
		// $image->move(public_path('images'),$file);
        $image->storeAs('ava',$file,'public'); // laravel storage use 

        $blog=new Blog([
            "name"=>$request->post("name"),
            "cat_id"=>$request->post("category"),
            "image"=>$file,
            "description"=>$request->post("description"),
        ]);
        if ($blog->save())
        {
            return redirect('blog')->with(['message'=>'successfully inserted','class'=>'success']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $category =category::toBase()->get();
        return view('editBlog',["blog"=>$blog,"category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:50',
            'category'=> 'required',
            'image'=> 'file|image|mimes:jpeg,png,jpg',
            "description" =>"required"
        ]);
        
        if ($request->has('image')) {
            // dd($product->image);
            storage::delete("./public/ava/$blog->image");
            $image=$request->file('image');
            $ext=$image->extension();
            $file=time().'.'.$ext;
            
            $image->storeAs('ava',$file,'public'); // laravel storage use 

            $blog->update([
                "name"=>$request->post("name"),
                "cat_id"=>$request->post("category"),
                "image"=>$file,
                "description"=>$request->post("description"),
            ]);
        }else {
            $blog->update([
                "name"=>$request->post("name"),
                "cat_id"=>$request->post("category"),
                "description"=>$request->post("description"),
            ]);
        }
        return redirect('blog')->with(['message'=>'successfully Update','class'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::delete("./public/ava/$blog->image");  
        $blog->delete();
        return redirect('blog')->with('message','Delete Successfully');
    }
    
}
