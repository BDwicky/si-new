<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register/index');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nim'           => 'required|is_unique[user.nim]',
            'nama_lengkap'  => 'required',
            'email'         => 'required|valid_email|is_unique[user.email]',
            'no_telp'       => 'required',
            'password'      => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $validation->getErrors()));
        }

        $model = new UserModel();
        $model->save([
            'nim'           => $this->request->getPost('nim'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'email'         => $this->request->getPost('email'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
