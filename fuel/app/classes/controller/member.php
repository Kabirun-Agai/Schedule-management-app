<?php

class Controller_Member extends Controller_Template
{
     public function before(){
        $username    = \Session::get('username');
		$login_hash  = \Session::get('login_hash');
        var_dump(Session::get('username'));
        var_dump(Session::get('login_hash'));
        exit;
         if (!Auth::check() and Request::active()->action != 'login_form'){
             var_dump(Auth::check());
             var_dump(Request::active()->action);
             exit;
            Response::redirect('user/login_form');
         }
     }
}