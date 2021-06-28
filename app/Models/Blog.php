<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo('App\Models\category','cat_id','id');
    }

    public $timestamps = true;
    protected $fillable = [
        'name',
        'cat_id',
        'description',
        'image',
    ];

}
