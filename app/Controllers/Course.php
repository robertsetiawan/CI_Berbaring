<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\CourseModel;

class Course extends BaseController
{
    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->courses = new CourseModel();
    }

    private function generateErrorToView($validation)
    {
        if ($validation->hasError('c_name')) {
            session()->setFlashdata('error_c_name', $validation->getError('c_name'));
        }

        if ($validation->hasError('c_desc')) {
            session()->setFlashdata('error_c_desc', $validation->getError('c_desc'));
        }

        if ($validation->hasError('category_id')) {
            session()->setFlashdata('error_category_id', $validation->getError('category_id'));
        }
    }

    public function index()
    {
        $data['categories'] = $this->categories->findAll();
        return view('add_course', $data);
    }

    public function add()
    {
        $validation = \Config\Services::validation();

        $validation->setRules($this->courses->validationRules, $this->courses->errorMessage);

        $isValid = $validation->withRequest($this->request)->run();

        $isPaidCourse = $this->request->getPost('paid_check'); //0 = false, 1 = true

        if ($isPaidCourse != null) { //validasi paid check

            if ($isPaidCourse && $this->request->getPost('c_price') < 1) {
                session()->setFlashdata('error_c_price', 'Harga Course harus lebih dari 0');

                $isValid = false;
            }
        } else {
            session()->setFlashdata('error_paid_check', 'Jenis Course harus ditentukan!');

            $isValid = false;
        }

        if (!$this->validate([
            'course_picture' => [
                'rules' => 'uploaded[course_picture]|mime_in[course_picture,image/jpg,image/jpeg,image/png]|max_size[course_picture,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'Format File Harus Berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {

            session()->setFlashdata('error_course_picture_1', $this->validator->getError('course_picture'));

            $isValid = false;
        }

        if ($this->request->getFile('course_picture') == null || !$this->request->getFile('course_picture')->isValid()) {

            session()->setFlashdata('error_course_picture_2', 'terjadi kesalahan upload gambar');

            $isValid = false;
        }

        if ($isValid) {

            $file = $this->request->getFile('course_picture');

            $fileName = $file->getRandomName();

            $file->move(ROOTPATH . 'public/uploads/', $fileName);

            $data = [
                'c_name' => $this->request->getPost('c_name'),
                'c_desc' => $this->request->getPost('c_desc'),
                'c_price' => ($isPaidCourse) ? $this->request->getPost('c_price') : 0,
                'c_imagepath' => $fileName,
                'category_id' => $this->request->getPost('category_id')
            ];

            $this->courses->insert($data);
        } else {

            $this->generateErrorToView($validation);

            return redirect()->back()->withInput();
            // echo $validation->listErrors();
        }
    }
}
