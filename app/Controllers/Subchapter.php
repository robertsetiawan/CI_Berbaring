<?php

namespace App\Controllers;

class Subchapter extends BaseController
{
    public function contentdetails()
    {
        return view('content_details');
    }
    public function editcontent()
    {
        return view('edit_contentdetails');
    }
}