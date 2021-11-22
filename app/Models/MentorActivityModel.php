<?php
namespace App\Models;

use CodeIgniter\Model;

class MentorActivityModel extends Model{
    protected $table = 'mentor_activity';
    protected $primaryKey = 'activity_mentor_id';
    protected $allowedFields = ['activity_mentor_id', 'created_date', 'published_date', 'user_id', 'c_id'];

    public $validationRules = [
        
    ];

    public $errorMessage = [

    ];

    public function getUserMentorActivity($uid)
    {
        $query = $this->db->query(
            'SELECT * FROM mentor_activity AS s
            LEFT JOIN course AS c
            ON s.c_id = c.c_id WHERE user_id =' . $this->db->escape($uid)
        );

        return $query->getResult('array');
    }
}