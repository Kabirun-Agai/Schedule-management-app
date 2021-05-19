<?php

use Fuel\Core\Model;

class Controller_Rest_Calendar extends Controller_Rest
{
    public function get_getEvents($param)
    {
        if($param == 0){
            $getEvents = Model_Event::event_all1();
        }else{
            $getEvents = Model_Event::event_category1($param);
        }
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
        if($param == 0){
            $getEvents = Model_Event::event_all2();
        }else{
            $getEvents = Model_Event::event_category2($param);
        }

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