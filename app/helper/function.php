<?php
use Illuminate\Support\Facades\DB;
if (!function_exists('oneRow')) {
  function oneRow($id,$table){
      return DB::table($table)->where('id',$id)->get();
  }

}

if (!function_exists('oneField')) {

  function oneField($id,$field,$table){
      $item= DB::table($table)->select($field)->where('id',$id)->get();
      return $item[0]->$field;
  }
}

if (!function_exists('sms')) {
  
  function sms($phone,$otp)
  {
      $fields = array(
          "variables_values" => "$otp",
          "route" => "otp",
          "numbers" => "$phone",
      );
      
      $curl = curl_init();
      
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
          "authorization: 5wMTIWYPFv3aXl0ibKmd98CJpeHANVojgBshxOuUyGc1Z24S6zNjOb0EDdaqYmHpXCePRlLW56x3IwAF",
          "accept: */*",
          "cache-control: no-cache",
          "content-type: application/json"
        ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      return $err;
  }
}
?>