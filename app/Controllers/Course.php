<?php

namespace App\Controllers;

class Course extends BaseController{
    public function index()
    {
        return view('add_course');
    }
}