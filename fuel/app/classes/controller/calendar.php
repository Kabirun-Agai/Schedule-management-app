<?php
class Controller_Calendar extends Controller
{
    public function action_index()
    {
        return Response::forge(View::forge('calendar'));
    }
}