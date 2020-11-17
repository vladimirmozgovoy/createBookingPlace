<?php

namespace App\Http\Controllers;

use App\Services\MeetingService;
use Illuminate\Http\Request;
use App\Helpers\ResponseObject;
use Illuminate\Support\Facades\Config;

class EventApiController extends Controller
{
    /**
     * Получение списка мероприятий
     */
    public function getAllMeetings(){
        $meetings = MeetingService::getAllMeetings();
      return ResponseObject::createResponse(200,'all events',$meetings);
    }

    /**
     * Получение информации о событиях на мироприятии
     * @param $id
     * @return false|string
     */
    public function getEvents($id){

        $events = MeetingService::getEvents($id);
        return ResponseObject::createResponse(200,'all events',$events);
    }

    /**
     * Список мест события
     * @param $id
     * @return false|string
     */
    public function getPlacesOfEvents($id){

        $events = MeetingService::getPlacesOfEvents($id);
        return ResponseObject::createResponse(200,'all events',$events);
    }

    /**
     * Забронировать места события
     * @param Request $request
     * @param $id
     * @return false|string
     */
    public function toBookPlace(Request $request,$id){
        $data = $request->post();
        $events = MeetingService::toBookPlace($data,$id);
        return ResponseObject::createResponse(200,'all events',$events);
    }

}
