<?php

class Controller_Member_Calendar extends Controller_Member
{
    public function action_index()
    {
        $time = date("Y/m/d H:i:s");
        $result["time"] = Model_Event::event_by('start', '>=',$time);
        
        $this->template->content = Response::forge(View::forge('calendar',$result));
    }
}