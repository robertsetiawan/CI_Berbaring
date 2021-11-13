<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\CourseModel;

class Course extends BaseController{
    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->courses = new CourseModel();
    }

    public function index()
    {
        return view('add_course');
    }
}
