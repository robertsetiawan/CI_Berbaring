<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'c_id';
    protected $allowedFields = ['c_name', 'c_imagepath', 'c_desc', 'c_price', 'category_id'];

    public $validationRules = [
        'c_name' => 'required',
        'c_desc' => 'required|max_length[1000]',
        'category_id' => 'required|greater_than[0]',
    ];

    public $errorMessage = [
        'c_name' => [
            'required' => 'Nama course harus diisi'
        ],
        'c_desc' => [
            'required' => 'Deskripsi course harus diisi',
            'max_length' => 'Panjang karakter maksimal adalah 1000'
        ],
        'category_id' => [
            'required' => 'Kategori harus dipilih',
            'greater_than' => 'Kategori harus dipilih'
        ]
    ];

    public function saveCourse($c_id, $c_name, $c_imagepath, $c_desc, $c_price, $category_id, $user_id)
    {

        $this->db->transBegin();

        $this->db->query('INSERT INTO course (c_id, c_name, c_imagepath, c_desc, c_price, category_id) VALUES (' . $c_id . ',' . $c_name . ',' . $c_imagepath . ',' . $c_desc . ',' . $c_price . ',' . $category_id . ') ');

        $this->db->query('INSERT INTO mentor_activity (created_date, published_date, user_id, c_id) VALUES (NOW(), NULL,' . $user_id . ',' . $c_id . ')');

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            $this->db->transCommit();
        }
    }

    public function info($c_id)
    {
        $query = $this->db->query('SELECT * FROM course c INNER JOIN category t ON c.category_id = t.category_id WHERE c.c_id=' . $c_id . ';');

        return $query->getRowArray();
    }

    public function searchc($c_name)
    {
        $query = $this->db->query('SELECT * FROM course c 
        INNER JOIN mentor_activity m ON c.c_id = m.c_id 
        INNER JOIN user u ON m.user_id = u.user_id 
        WHERE m.published_date IS NOT NULL AND c.c_name LIKE "%' . $c_name . '%"');

        return $query->getResultArray();
    }

    public function landing()
    {
        $query = $this->db->query('SELECT * FROM course c 
        INNER JOIN mentor_activity m ON c.c_id = m.c_id 
        INNER JOIN user u ON m.user_id = u.user_id 
        WHERE m.published_date IS NOT NULL LIMIT 4');

        return $query->getResultArray();
    }

    public function getCourseDetail($c_id)
    {
        $query = $this->db->query('SELECT c.*, t.*,u.name AS publisher FROM course c 
        INNER JOIN category t ON c.category_id = t.category_id 
        INNER JOIN mentor_activity m ON c.c_id = m.c_id 
        INNER JOIN user u ON m.user_id = u.user_id
        WHERE c.c_id =' .$c_id. ';');

        return $query->getRowArray();
    }
}
