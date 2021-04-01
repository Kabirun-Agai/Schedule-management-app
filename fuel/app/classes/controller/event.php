<?php

use Fuel\Core\Controller;

class Controller_Event extends Controller{

    public function action_index(){
        $data = array();
        $data['rows'] = Model_Event::find_all();

        return View::forge('event/list',$data);
    }

    public function action_auto_insert(){
        for ($i = 1 ; $i < 11; $i++){
            $event = Model_Event::forge();

            $row = array();
            $row['title'] = $i . "番目の予定";
            $row['startdate'] = $i . " " . "2021-04-01";
            $row['deadline'] = $i . " " . "2021-04-02";
            $row['details'] = $i . "番目の詳細";

            $event->set($row);
            $event->save();
        }
        echo "Finished";
    }
}