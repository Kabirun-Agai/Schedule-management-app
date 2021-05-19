<?php

class Model_User extends Model_Crud{
    protected static $_table_name = 'users_table';
    protected static $_primary_key = 'id';

    static function editUsername($p_post){
        $query = DB::update('users_table');
        $query->value('username',$p_post['username']);
        $query->where('id', '=', Arr::get(Auth::get_user_id(),1));
        $result = $query->execute();

        return $result;
    }

    static function editEmail($p_post){

        $query = DB::update('users_table');
        $query->value('email',$p_post['email']);
        $query->where('id', '=', Arr::get(Auth::get_user_id(),1));
        $result = $query->execute();

        return $result;
    }
}

?>