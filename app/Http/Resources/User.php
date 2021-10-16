<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Blog;
use App\Models\category;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category_name'=>Blog::find($this->id)->category->name,#$this->category->name,
            'description'=>$this->description,
            'image'=>$this->image,

        ];
    }
}
