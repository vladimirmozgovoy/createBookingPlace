<?php

namespace App\Services;
use Illuminate\Support\Facades\Config;

class MeetingService extends BaseService
{
    /*
  * Получение списка мероприятий
  */
    public static function getAllMeetings(){

        $url = self::prepareUrl(__FUNCTION__);

        return CurlService::createRequest($url,'GET');
    }
    /*
     * Получение информации о событиях на мироприятии
     */
    public static function getEvents($id){
        $url = self::prepareUrl(__FUNCTION__,$id);
        return CurlService::createRequest($url,'GET');
    }
    /*
    * Список мест события
    */
    public static function getPlacesOfEvents($id){
        $url = self::prepareUrl(__FUNCTION__,$id);
        return CurlService::createRequest($url,'GET');
    }
    /*
    * Забронировать места события
    */
    public static function toBookPlace($data,$id){
        $url = self::prepareUrl(__FUNCTION__,$id);
        return CurlService::createRequest($url,'POST',$data);
    }
}
