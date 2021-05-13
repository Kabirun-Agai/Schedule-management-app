<?php

use Fuel\Core\Input;

class Controller_User extends Controller_Template{

   
    public function action_form(){
        $this->template->content = Response::forge(View::forge('user/form'));
    }
    public function action_save(){
        $auth = Auth::instance();
        $auth->create_user(Input::post('username'), Input::post('password'), Input::post('email'));
        if (Auth::login(Input::post('username'), Input::post('password'))){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/login_form', $data));
        }
    }

 

    public function action_login_form(){
        $this->template->content = Response::forge(View::forge('user/login_form'));
    }

    public function action_login(){
        if (Auth::login(Input::post('username'), Input::post('password'))){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/login_form', $data));
        }
    }

    public function action_logout(){
        $auth = Auth::instance();
        $auth->logout();

        Response::redirect('welcome');
    }

    public function action_edit_form(){
        $this->template->content = Response::forge(View::forge('user/edit_form'));
    }

    public function action_editemail(){
        $query = DB::update('users_table');
        $query->value('email',Input::post('email'));
        $query->where('id', '=', 1);
        $result = $query->execute();
        
        if($result){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }

    public function action_editusername(){
        $query = DB::update('users_table');
        $query->value('username',Input::post('username'));
        $query->where('id', '=', 1);
        $result = $query->execute();
        
        if($result){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }

    public function action_editpassword(){
        $auth = Auth::instance();
        
        if($auth->change_password(Input::post('password'), Input::post('newpassword'))){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }
}