<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentActivityModel extends Model{
    protected $table = 'student_activity';
    protected $primaryKey = 'activity_student_id';
    protected $allowedFields = ['activity_student_id', 'started_date', 'finished_date', 'user_id', 'c_id'];

    public $validationRules = [
        
    ];

    public $errorMessage = [

    ];

    public function getUserStudentActivity($uid, $page)
    {
        $query = $this->db->query(
            'SELECT activity_student_id, started_date, finished_date, s.c_id, c.c_name AS title, c.c_imagepath AS imgpath, c.c_desc AS content
            FROM student_activity AS s
            LEFT JOIN course AS c
            ON s.c_id = c.c_id
            WHERE user_id=' . $this->db->escape($uid) . 
            'LIMIT '. ($page-1)*4 .','. (($page-1)*4+4)
        );

        return $query->getResult('array');
    }

    public function getUserStudentActivityCount($uid)
    {
        $query = $this->db->query(
            'SELECT count(*) AS totalCourse FROM `student_activity` WHERE user_id ='.$this->db->escape($uid)
        );
        $row = $query->getRow();

        return $row->totalCourse;
    }
}