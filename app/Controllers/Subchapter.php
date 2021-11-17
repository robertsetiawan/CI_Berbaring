<?php

namespace App\Controllers;

use App\Models\SubchapterModel;

class Subchapter extends BaseController
{
    public function __construct()
    {
        $this->subchapters = new SubchapterModel();
    }
    public function index($c_id)
    {

        $data['c_id'] = $c_id;
        return view('course_detail', $data);
    }

    public function add($c_id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->subchapters->validationRules, $this->subchapters->errorMessage);

        $isValid = $validation->withRequest($this->request)->run();

        if (!$this->validate([
            'sc_filepath' => [
                'rules' => [
                    'uploaded[sc_filepath]',
                    'mime_in[sc_filepath,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf,text/plain]',
                    'max_size[sc_filepath,10240]'
                ],
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'Format File Harus Berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]
            ]
        ])) {

            session()->setFlashdata('error_file_1', $this->validator->getError('sc_filepath'));

            $isValid = false;
        }

        if ($this->request->getFile('sc_filepath') == null || !$this->request->getFile('sc_filepath')->isValid()) {

            session()->setFlashdata('error_file_2', 'terjadi kesalahan upload file');

            $isValid = false;
        }

        if ($isValid) {

            $file = $this->request->getFile('sc_filepath');

            $fileName = $file->getRandomName();

            $sc_id = (int)round(gettimeofday(true));

            $file->move(ROOTPATH . 'public/uploads/' . $c_id . '/' . $sc_id . '/', $fileName);

            $data['sc_name'] = $this->request->getPost('sc_name');

            $data['sc_video_link'] = $this->request->getPost('sc_video_link');

            $data['sc_filepath'] = $fileName;

            $data['sc_desc'] = $this->request->getPost('sc_desc');

            $data['c_id'] = $c_id;

            $this->subchapters->insert($data);

            return redirect()->to(base_url('course/' . $c_id . '/info'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function delete($c_id, $sc_id)
    {
        $this->subchapters->where('sc_id', $sc_id)->delete();

        return redirect()->to(base_url('course/' . $c_id . '/info'));
    }
}
