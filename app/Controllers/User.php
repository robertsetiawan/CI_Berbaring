<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController{
    
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function register()
    {
        $full_name = $this->request->getPost('full_name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $check_email_q = $this->user->db->query("SELECT * FROM user WHERE email ='" .$email."'");
        $row = $check_email_q->getRow();

        if (!empty($row)){
            session()->setFlashdata('error_reg_email', 'Email sudah terdaftar!');

            return redirect()->back()->withInput();
        }else{
            $register_q = 'INSERT INTO user (user_id, joined_date, name, email, password) VALUES (NULL, \''.date("Y-m-d").'\', \''.$full_name.'\', \''.$email.'\', MD5(\''.$password.'\')) ';
            
            $db = db_connect();
            $db->query($register_q);

            session()->setFlashdata('register_email', $email);
            return redirect()->to('/login')->withInput();
        }

    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userid = $this->user->getUserIdFromDatabase($email, $password);

        if (empty($userid)) {
            session()->setFlashdata('error_login', 'Email dan/atau password salah!');

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