<?php

namespace App\Http\Controllers;

use App\Helpers\TableHelper;
use App\Services\MeetingService;
use Illuminate\Http\Request;
use App\Helpers\ResponseObject;
use Illuminate\Support\Facades\Config;

class EventController extends Controller
{
    /**
     * Получение списка мероприятий
     */
    public function getAllMeetings(){
        $meetings = MeetingService::getAllMeetings();
        $meetings = json_decode($meetings);
        $meetings = $meetings->response;

        return view('meetings')->with('meetings',$meetings);
    }

    /**
     * Получение информации о событиях на мироприятии
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getEvents($id){

        $events = MeetingService::getEvents($id);
        $events = json_decode($events);
        $events = $events->response;
        return view('events')->with('events',$events);
    }

    /**
     * Список мест события
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getPlacesOfEvents($id){

        $places = MeetingService::getPlacesOfEvents($id);
        $places = json_decode($places);
        $places = $places->response;
        $places = TableHelper::dataToColumn(10,$places);
        return view('places')->with([
            'places'=> $places,
            'id'=> $id
        ]);

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
