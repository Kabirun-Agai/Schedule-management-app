<?php


class Controller_Rest_Calendar extends Controller_Rest
{
    public function get_getEvents($param)
    {
        if($param == 0){
            $getEvents = [];
            $getEvents = Model_Event::find_all();
        }else{
            $getEvents = [];
            $getEvents = Model_Event::find_by("category", $param);
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

    public function get_getEvents2($param)
    {
        $range_start = $_GET['start'];
        $range_end = $_GET['end'];
        
        $time = date("Y/m/d H:i:s");
        $query = DB::select()->from('events_table');
        $query->where('start', '>=', $time);
        $getEvents = $query->execute()->as_array();

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
      $p_post = Input::post();
      $query = DB::update('events_table');
      $query->value('start', $p_post["start_date"]);
      $query->value('end', $p_post["end_date"]);
      $query->where('id', $p_post["id"]);
      $result = $query->execute();
     }

}