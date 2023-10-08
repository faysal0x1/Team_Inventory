<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
 public static function Out($status, $msg,$data,$code):JsonResponse{
   return  response()->json(['status'=>$status,'msg' => $msg, 'data' =>  $data],$code);
 }
}
