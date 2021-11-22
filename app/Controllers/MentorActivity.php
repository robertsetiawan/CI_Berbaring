<?php

namespace App\Controllers;
use App\Models\MentorActivityModel;

class MentorActivity extends BaseController{
    function __construct(){
        $this->activity = new MentorActivityModel;
    }

    function page(){
        $data = [
            'courses' => $this->activity->getUserMentorActivity(session()->get('id')),
        ];
        return view('homepage_mentor.php', $data);
    }
}