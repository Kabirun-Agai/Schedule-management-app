<?php

class Controller_Calendar extends Controller_Template
{
    public function action_index()
    {
        $data = array();
        $data['events'] = Model_Event::find_all();
        $this->template->content = Response::forge(View::forge('calendar',$data));
    }
}