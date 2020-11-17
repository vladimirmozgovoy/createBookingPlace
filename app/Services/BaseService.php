<?php


namespace App\Services;


use Illuminate\Support\Facades\Config;

class BaseService
{
    public static function prepareUrl(string $nameAction, $id = null)
    {
        $supplier = env('SUPPLIER');
        $baseConfParam = 'app.suppliers.'.$supplier;
        $hostConfParam = $baseConfParam.'.host';
        $host = Config::get($hostConfParam);
        $methodConfParam = Config::get($baseConfParam.'.'.$nameAction);
        if($id != null){
            $methodConfParam =  str_replace("{id}", $id, $methodConfParam);
        }
        return $host.$methodConfParam;
    }
}
