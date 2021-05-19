<?php

class Controller_Member_Event extends Controller_Member
{

    public function action_index(){
        $data = array();
        $data['rows'] = Model_Event::event_all();

        return View::forge('calendar',$data);
    }

    public function action_form(){
        $this->template->content = Response::forge(View::forge('event/form'));
    }

    public function action_show($parama_1, $parama_2){
        $data = array();
        $data['rows'] = Model_Event::event_by('id' ,'=' ,$parama_1);
        $data["data"] = (string) $parama_2;

        $this->template->content = Response::forge(View::forge('event/show', $data));
    }

    public function action_edit_form($parama_1){
        $data = array();
        $data['rows'] = Model_Event::event_by('id' ,'=' ,$parama_1);
        $this->template->content = Response::forge(View::forge('event/edit_form',$data));
    }

    public function action_edit($parama_1){
        Model_Event::edit($parama_1, Input::post());

        Response::redirect('/member/calendar');
      }

    public function action_save(){
        Model_Event::event_save(Input::post());
        Response::redirect('/member/calendar');
    }

    public function action_delete($parama_1){
        Model_Event::event_delete($parama_1);
        Response::redirect('/member/calendar');
    }

}