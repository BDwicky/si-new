<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('dashboard/admin/index', $data);
    }

    public function create()
    {
        return view('dashboard/admin/create');
    }

    public function store()
    {
        try {
            $this->userModel->save([
                'username' => $this->request->getPost('username'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'nim' => $this->request->getPost('nim'),
                'phone' => $this->request->getPost('phone'),
                'fakultas' => $this->request->getPost('fakultas'),
                'program_studi' => $this->request->getPost('program_studi'),
                'role_id' => $this->request->getPost('role_id'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
            session()->setFlashdata('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan User: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/admin');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('dashboard/admin'))->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'user' => $user
        ];

        return view('dashboard/admin/edit_user', $data);
    }

    public function update($id)
    {
        // Validasi data bisa ditambahkan sesuai kebutuhan
        $data = [
            'username'       => $this->request->getPost('username'),
            'name'           => $this->request->getPost('name'),
            'email'          => $this->request->getPost('email'),
            'nim'            => $this->request->getPost('nim'),
            'phone'          => $this->request->getPost('phone'),
            'fakultas'       => $this->request->getPost('fakultas'),
            'program_studi'  => $this->request->getPost('program_studi'),
            'role_id'        => $this->request->getPost('role_id'),
        ];

        // Kalau password diisi baru, update sekalian
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        return redirect()->to(base_url('dashboard/admin'))->with('success', 'User berhasil diupdate.');
    }


    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('dashboard/admin'))->with('success', 'Data berhasil dihapus.');
    }
};
