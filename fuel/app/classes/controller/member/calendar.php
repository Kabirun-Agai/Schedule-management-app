<?php

class Controller_Member_Calendar extends Controller_Member
{
    public function action_index()
    {
        $time = date("Y/m/d H:i:s");
        $query = DB::select()->from('events_table');
        $query->where('start', '>=', $time);
        $result["time"] = $query->execute()->as_array();
        $this->template->content = Response::forge(View::forge('calendar',$result));
    }
}