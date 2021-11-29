<?php
namespace App\Models;

use CodeIgniter\Model;

class MentorActivityModel extends Model{
    protected $table = 'mentor_activity';
    protected $primaryKey = 'activity_mentor_id';
    protected $allowedFields = ['activity_mentor_id','created_date', 'published_date', 'user_id', 'c_id'];


    public function getCouserCreatorId($c_id)
    {
        return $this->db->query('SELECT user_id FROM mentor_activity WHERE c_id=' .$c_id)->getRow();
    }
}