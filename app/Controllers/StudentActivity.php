<?php

namespace App\Controllers;
use App\Models\StudentActivityModel;

class StudentActivity extends BaseController{

    function __construct(){
        $this->activity = new StudentActivityModel;
    }

    function page($curr){
        $session = session();
        if ($session->get('is_logged_in')){
            $data = [
                'courses' => $this->activity->getUserStudentActivity(session()->get('id'), $curr),
                'totalCourses' => $this->activity->getUserStudentActivityCount(session()->get('id')),
                'page' => $curr
            ];
            return view('homepage_pelajar.php', $data);
        }else{
            return redirect()->to('/login');
        }
    }
}