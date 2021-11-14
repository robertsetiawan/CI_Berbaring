<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_id', 'joined_date', 'name', 'email', 'password'];

    public $validationRules = [
        
    ];

    public $errorMessage = [

    ];

    public function getUserIdFromDatabase($email, $password)
    {
        $query = $this->db->query('SELECT user_id FROM user WHERE email=' . $this->db->escape($email) . 'AND password=' . $this->db->escape(md5($password)));
        $row = $query->getRow();

        if (empty($row->user_id)) {
            return false;
        } else {
            return $row->user_id;
        }
    }
}