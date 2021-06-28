<?php
use Illuminate\Support\Facades\DB;

function oneRow($id,$table){
    return DB::table($table)->where('id',$id)->get();
}
function oneField($id,$field,$table){
    $item= DB::table($table)->select($field)->where('id',$id)->get();
    return $item[0]->$field;
}
?>