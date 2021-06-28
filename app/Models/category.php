<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    function getAll(){
        return $this->hasMany('App\Models\Blog','cat_id','id');
    }

    public $timestamps = true;
    protected $fillable = [
        'name',
        'description',
    ];

}
