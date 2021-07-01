<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;
class PagiBlog extends Component
{
    use WithPagination;

    public function render()
    {
         ///  join start
        //  $blog = category::select('blogs.id','blogs.name','blogs.image','blogs.description','categories.name as c_name')->join('blogs','blogs.cat_id','=','categories.id')->paginate(2);//its also work
         // dd($data);
    
         ///  join end
         
         //  dd(Blog::find(5)->category->name); working fine
 
         $blog =Blog::toBase()->orderBy('id','DESC')->paginate(2);//its also work
         // $absentData = User::collection($blog);
         // dd($absentData);
        return view('livewire.pagi-blog',[
            'blog'=>$blog
        ]);
    }
}
