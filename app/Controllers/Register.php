<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('register/index');
    }

    public function store()
    {
        try {
            $this->userModel->save([
                'username' => $this->request->getPost('username'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'nim' => $this->request->getPost('nim'),
                'fakultas' => $this->request->getPost('fakultas'),
                'program_studi' => $this->request->getPost('program_studi'),
                'role_id' => $this->request->getPost('role_id') ?: 3, // Default to 'User' role if not provided
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
            session()->setFlashdata('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan User: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
