<?php

class Controller_User extends Controller_Template{

    public function action_form(){
        $this->template->content = Response::forge(View::forge('user/form'));
    }
    public function action_save(){
        $auth = Auth::instance();
        $auth->create_user(Input::post('username'), Input::post('password'), Input::post('email'));
        if (Auth::login(Input::post('username'), Input::post('password'))){
            Response::redirect('member/calendar');
        }
    }

    public function action_login_form(){
        $this->template->content = Response::forge(View::forge('user/login_form'));
    }

    public function action_login(){
        if (Auth::login(Input::post('username'), Input::post('password'))){
            Response::redirect('member/calendar');
        }
    }
}