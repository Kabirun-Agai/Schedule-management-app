<?php

use Fuel\Core\Input;

class Controller_User extends Controller_Template{

   
    public function action_form(){
        $this->template->content = Response::forge(View::forge('user/form'));
    }
    public function action_save(){
        $result = Model_User::userSave(Input::post());

        if($result){
            if (Auth::login(Input::post('username'), Input::post('password'))){
                Model_User::createTime();
                Response::redirect('member/calendar');
            }else{
                $data["error"] = true;
                $this->template->content = Response::forge(View::forge('user/login_form', $data));
            }
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
        $result = Model_User::editUser(Input::post());
        
        if($result){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }

    public function action_editusername(){
        $result = Model_User::editUser(Input::post());
        
        if($result){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }

    public function action_editpassword(){
        $result = Model_User::editUser(Input::post());
        
        if($result){
            Response::redirect('member/calendar');
        }else{
            $data["error"] = true;
            $this->template->content = Response::forge(View::forge('user/edit_form', $data));
        }
    }

    
}