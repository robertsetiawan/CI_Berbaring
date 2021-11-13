<?php
namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model{
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
            'greater_than' =>'Kategori harus dipilih'
        ]
    ];
}