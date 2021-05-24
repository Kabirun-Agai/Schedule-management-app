<?php

class Controller_Member extends Controller_Template
{
    
     public function before(){
        parent::before();
        //  if (!Auth::check() and Request::active()->action != 'login_form'){
        //     Response::redirect('user/login_form');
        //  }
     }
}