<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addController extends Controller
{
    public function add(Request $request)
    {
        return DB::table('carti')->insert([
            'item' => $request->name
        ]);
    }

    public function cartNo()
    {
        // return DB::table('carti')->where("id",1)->count(); # pratice count method
        return DB::table('carti')->count();
    }
    public function cartdsso()
    {
        // return DB::table('carti')->where("id",1)->count(); # pratice count method
        return DB::table('carti')->count();
    }
    public function cvgdcfg()
    {
        // return DB::table('carti')->where("id",1)->count(); # pratice count method
        return DB::table('carti')->count();
    }
}