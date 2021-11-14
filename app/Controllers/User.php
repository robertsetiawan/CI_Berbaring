<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController{
    
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userid = $this->user->getUserIdFromDatabase($email, $password);

        if (empty($userid)) {
            session()->setFlashdata('error_login', 'email dan password tidak ditemukan');

            return redirect()->back()->withInput();
        } else {

            $login_data = [
                'id' => $userid,
                'email' => $email,
                'is_logged_in' => true
            ];
            $session = session();

            $session->set($login_data);

            if (!$this->request->getPost('keeplogin') == true) 
            {
                // login 30 menit
                // default CI session 2 jam
                $session->markAsTempdata('is_logged_in', 1800);
            }

            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}