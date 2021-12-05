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
  
    public function getCouserCreatorId($c_id)
    {
        return $this->db->query('SELECT user_id FROM mentor_activity WHERE c_id=' .$c_id)->getRow();
    }

    public function getUserMentorActivity($uid)
    {
        $query = $this->db->query(
            'SELECT * FROM mentor_activity AS s
            INNER JOIN course AS c
            ON s.c_id = c.c_id WHERE user_id =' . $this->db->escape($uid)
        );

        return $query->getResult('array');
    }

    public function getCoursePublishedDate($c_id)
    {
        $query = $this->db->query('SELECT published_date FROM mentor_activity WHERE c_id=' .$c_id);

        return $query->getRow();
    }
}