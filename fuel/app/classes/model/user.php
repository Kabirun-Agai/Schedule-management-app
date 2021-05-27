<?php

class Model_User extends Model_Crud{

    static function userSave($p_post){
        $auth = Auth::instance();
        $result = $auth->create_user($p_post["username"], $p_post["password"], $p_post["email"]);

        return $result;
    }

    static function createTime(){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('users_table');
        $query->value('created_at', $time);
        $query->where('id', '=', Arr::get(Auth::get_user_id(),1));
        $result = $query->execute();
    }


    static function editUser($p_post){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('users_table');
        
        if(array_key_exists('username',$p_post)){
            $query->value('username',$p_post['username']);
        }elseif(array_key_exists('email',$p_post)){
            $query->value('email',$p_post['email']);
        }
        $query->value('updated_at', $time);
        $query->where('id', '=', 1);
        $result = $query->execute();

        if(array_key_exists('password',$p_post)){
            $auth = Auth::instance();
            $result = $auth->change_password($p_post["password"], $p_post["newpassword"]);
        }

        return $result;
    }
}

?>