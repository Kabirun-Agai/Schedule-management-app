<?php

class Model_Event extends Model_Crud{


    static function event_all(){
        $query =  DB::select()->from("events_table");
        $query->where('deleted_at', '=', null);
        $result = $query->execute()->as_array();

        return $result; 
    }

    static function event_by($str ,$terms ,$parama){
        $query = DB::select()->from("events_table");
        $query->where($str, $terms, $parama);
        $query->where('deleted_at', '=', null);
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
            'created_at'=>  $time,
            'user_id' => Arr::get(Auth::get_user_id(),1),
        ));
        $result = $query->execute();
        return $result;
    }

    static function edit($parama, $p_post){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('events_table');
        $query->set(array(
            'title'=> $p_post["title"],
            'start'=> $p_post["start"],
            'end'  => $p_post["end"],
            'details'=> $p_post["details"],
            'category'=> $p_post["state"],
            'updated_at'=>  $time,
        ));
        $query->where('id', $parama);
        $result = $query->execute();
        return $result;
    }

    static function event_delete($parama){
        $time = date("Y/m/d H:i:s");

        $query = DB::update('events_table');
        $query->value('deleted_at', $time);
        $query->where('id', '=', $parama);
        $result = $query->execute();

        return $result;
    }

    //イベントを所得する
    //calendar２のイベント取得するときは$valに1を指定する
    static function event_get($param, $val = false){
        $time = date("Y/m/d H:i:s");
        $query = DB::select()->from('events_table');
        $query->where('user_id', '=', Arr::get(Auth::get_user_id(),1));
        $query->where('deleted_at', '=', null);
        
        if($param != 0){
            $query->where('category', '=', $param);
        }

        if($val){
            $query->where('start', '>=', $time);
        }
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