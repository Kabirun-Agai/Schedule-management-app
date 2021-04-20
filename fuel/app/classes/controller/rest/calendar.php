<?php


class Controller_Rest_Calendar extends Controller_Rest
{
    public function get_getEvents($param)
    {
        
        $range_start = $_GET['start'];
        $range_end = $_GET['end'];
        $getEvents = [];
        $getEvents = Model_Event::find_all();

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