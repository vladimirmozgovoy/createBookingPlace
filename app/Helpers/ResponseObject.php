<?php

namespace App\Helpers;
class ResponseObject
{
    /**
     * create JSON response
     * @param int $code
     * @param string $message
     * @param string $data
     * @return false|string
     */
    public static function createResponse(int $code,string $message, string $data){
        switch ($code){
            case 200 :
                $response['code'] = 200 ;
                $response['result'] = true ;
                break;
            case 500 :
                $response['code'] = 500 ;
                $response['result'] = false ;
                break;
        }
        $response['message'] = $message ;
        $response['data'] = json_decode($data) ;
      return  $response = json_encode($response,JSON_UNESCAPED_UNICODE);
    }
}
