<?php
namespace App\Models;

use CodeIgniter\Model;

class SubchapterModel extends Model{
    protected $table = 'subchapter';
    protected $primaryKey = 'sc_id';
    protected $allowedFields = ['sc_id', 'sc_name', 'sc_video_link', 'sc_filepath', 'sc_desc', 'c_id'];

    public $validationRules = [
        'sc_name' => 'required',
        'sc_video_link' => 'required',
        'sc_desc' => 'required|max_length[1000]',
    ];

    public $errorMessage = [
        'sc_name' => [
            'required' => 'Nama chapter harus diisi'
        ],
        'sc_video_link' => [
            'required' => 'Link refrensi harus disediakan'
        ],
        'sc_desc' => [
            'required' => 'Deskripsi course harus diisi',
            'max_length' => 'Panjang karakter maksimal adalah 1000'
        ],
    ];

    public function getChapters($c_id){
        $query = $this->db->query('SELECT * FROM subchapter WHERE c_id = '.$c_id);

        return $query->getResultArray();
    }    
}