<?php


class Controller_Rest_User extends Controller_Rest
{
    public function action_form(){
        return View::forge('user/form');
    }

    // public function post_dropEvents() // ドラッグ&ドロップしたときの挙動
    // {
    //   $p_post = Input::post();
    //   $query = DB::update('events_table');
    //   $query->value('start', $p_post["start_date"]);
    //   $query->value('end', $p_post["end_date"]);
    //   $query->where('id', $p_post["id"]);
    //   $result = $query->execute();
    //  }

    
}