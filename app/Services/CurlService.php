<?php

namespace App\Services;
use Illuminate\Support\Facades\Config;

class CurlService
{
    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @param null $id
     * @return bool|string
     * Create Curl Request
     */
    public static function createRequest(string $url ,string $method, $data = [], $id = null){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($method == "POST"){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        $headers[] = "Authorization: token=f72e02929b79c96daf9e336e0a5cdb8059e60685";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        return $result;
    }
}
