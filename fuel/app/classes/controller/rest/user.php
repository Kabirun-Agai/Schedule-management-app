<?php


class Controller_Rest_User extends Controller_Rest
{
    public function action_form(){
        return View::forge('user/form');
    }
    
}