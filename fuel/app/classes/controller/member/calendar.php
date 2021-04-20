<?php

class Controller_Member_Calendar extends Controller_Member
{
    public function action_index()
    {
        $getEvents = array();
        $getEvents = Model_Event::find_all();

        $this->template->content = Response::forge(View::forge('calendar'));
    }
}