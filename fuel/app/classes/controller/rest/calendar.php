<?php

use Fuel\Core\Model;

class Controller_Rest_Calendar extends Controller_Rest
{
    public function get_getEvents($param)
    {
        $getEvents = Model_Event::event_get($param);
     
        $events = array();

        if($getEvents){
            foreach($getEvents as $values){
                $event = array();
                $event["id"] = $values["id"];
                $event["title"] = $values["title"];
                $event["start"] = $values["start"];
                $event["end"] = $values["end"];
                $events[] = $event;
            }
        }
        
        echo json_encode($events);
    }

    public function get_getEvents2($param)
    {
        $getEvents = Model_Event::event_get($param, 1);

        $events = array();
        foreach($getEvents as $values){
            $event = array();
            $event["id"] = $values["id"];
            $event["title"] = $values["title"];
            $event["start"] = $values["start"];
            $event["end"] = $values["end"];
            $events[] = $event;
        }
        echo json_encode($events);
    }
    
    public function post_dropEvents() // ドラッグ&ドロップしたときの挙動
    {
      Model_Event::dropEvents(Input::post());
     }

}