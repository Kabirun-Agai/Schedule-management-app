<?php

class Controller_Member_Event extends Controller_Member
{

    public function action_index(){
        $data = array();
        $data['rows'] = Model_Event::find_all();

        return View::forge('calendar',$data);
    }

    public function action_form(){
        $this->template->content = Response::forge(View::forge('event/form'));
    }

    public function action_show($parama_1, $parama_2){
        $data = array();
        $data['rows'] = Model_Event::find_by('id' , $parama_1);
        $data["data"] = (string) $parama_2;

        $this->template->content = Response::forge(View::forge('event/show', $data));
    }

    public function action_edit_form($parama_1){
        $data = array();
        $data['rows'] = Model_Event::find_by('id' , $parama_1);
        $this->template->content = Response::forge(View::forge('event/edit_form',$data));
    }

    public function action_edit($parama_1){
        $p_post = Input::post();
        $query = DB::update('events_table');
        $query->value('title', $p_post["title"]);
        $query->value('start', $p_post["start"]);
        $query->value('end', $p_post["end"]);
        $query->value('details', $p_post["details"]);
        $query->where('id', $parama_1);
        $result = $query->execute();

        Response::redirect('/member/calendar');
      }

    public function action_save(){
        $form = array();
        $form['title'] = Input::post('title');
        $form['start'] = Input::post('starttime');
        $form['end'] = Input::post('endtime');
        $form['details'] = Input::post('details');
        $form['category'] = Input::post('state');
        

        $event = Model_Event::forge();
        $event->set($form);
        $event->save();
        Response::redirect('/member/calendar');
    }

    public function action_delete($parama_1){
        $query = DB::delete('events_table')->where('id', '=', $parama_1);
        $result = $query->execute();

        Response::redirect('/member/calendar');
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