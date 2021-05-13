<?php


class Controller_Rest_Calendar extends Controller_Rest
{
    public function get_getEvents($param)
    {
        if($param == 0){
            $query = DB::select()->from('events_table');
            $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
            $getEvents = $query->execute()->as_array();
        }else{
            $query = DB::select()->from('events_table');
            $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
            $query->where('category', '=', $param);
            $getEvents = $query->execute()->as_array();
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
            $time = date("Y/m/d H:i:s");
            $query = DB::select()->from('events_table');
            $query->where('start', '>=', $time);
            $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
            $getEvents = $query->execute()->as_array();
        }else{
            $time = date("Y/m/d H:i:s");
            $query = DB::select()->from('events_table');
            $query->where('start', '>=', $time);
            $query->where('category', '=', $param);
            $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
            $getEvents = $query->execute()->as_array();
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
      $p_post = Input::post();
      $query = DB::update('events_table');
      $query->value('start', $p_post["start_date"]);
      $query->value('end', $p_post["end_date"]);
      $query->where('id', $p_post["id"]);
      $result = $query->execute();
     }

}