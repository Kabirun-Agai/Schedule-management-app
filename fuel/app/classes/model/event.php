<?php

class Model_Event extends Model_Crud{
    protected static $_table_name = 'events_table';
    protected static $_primary_key = 'id';

    static function event_all(){
        $query =  DB::select()->from("events_table");
        $result = $query->execute()->as_array();

        return $result; 
    }

    static function event_by($str ,$terms ,$parama){
        $query = DB::select()->from("events_table");
        $query->where($str, $terms, $parama);
        $result = $query->execute()->as_array();

        return $result;
    }


    static function event_save($p_post){
        $time = date("Y/m/d H:i:s");
        
        $query = DB::insert('events_table');
        $query->set(array(
            'title'=> $p_post["title"],
            'start'=> $p_post["start"],
            'end'  => $p_post["end"],
            'details'=> $p_post["details"],
            'category'=> $p_post["state"],
            'updated_at'=>  $time,
        ));
        $result = $query->execute();
        return $result;
    }

    static function edit($parama, $p_post){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('events_table');
        $query->value('title', $p_post["title"]);
        $query->value('start', $p_post["start"]);
        $query->value('end', $p_post["end"]);
        $query->value('details', $p_post["details"]);
        $query->value('category', $p_post["state"]);
        $query->value('updated_at', $time);
        $query->where('id', $parama);
        $result = $query->execute();
        return $result;
    }

    static function event_delete($parama){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('events_table');
        $query->value('delete_flag', true);
        $query->value('deleted_at', $time);
        $query->where('id', '=', $parama);
        $result = $query->execute();

        return $result;
    }

    //すべてのイベント表示
    static function event_all1(){
        $query = DB::select()->from('events_table');
        $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
        $query->where('delete_flag', '=', null);
        $result = $query->execute()->as_array();

        return $result;
    }
    
    static function event_all2(){
        $time = date("Y/m/d H:i:s");
        $query = DB::select()->from('events_table');
        $query->where('start', '>=', $time);
        $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
        $query->where('delete_flag', '=', null);
        $result = $query->execute()->as_array();

        return $result;
    }

    // 指定されたカテゴリのイベント表示
    static function event_category1($param){
        $query = DB::select()->from('events_table');
        $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
        $query->where('category', '=', $param);
        $query->where('delete_flag', '=', null);
        $result = $query->execute()->as_array();

        return $result;
    }

    static function event_category2($param){
        $time = date("Y/m/d H:i:s");
        $query = DB::select()->from('events_table');
        $query->where('start', '>=', $time);
        $query->where('category', '=', $param);
        $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
        $query->where('delete_flag', '=', null);
        $result = $query->execute()->as_array();

        return $result;
    }

    // イベントをドロップ&ドロップしたときの処理
    static function dropEvents($p_post){
        $p_post = Input::post();
        $query = DB::update('events_table');
        $query->value('start', $p_post["start_date"]);
        $query->value('end', $p_post["end_date"]);
        $query->where('id', $p_post["id"]);
        $result = $query->execute();   

        return $result;
    }

}