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
        // $data['users'] = $this->userModel->findAll();
        // return view('dashboard/users/index', $data);
        return view('dashboard/users/index');
    }

    public function create()
    {
        return view('dashboard/users/create');
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
                'role_id' => $this->request->getPost('role_id'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
            session()->setFlashdata('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menambahkan User: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to('/dashboard/users');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('dashboard/users/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'nim' => $this->request->getPost('nim'),
            'fakultas' => $this->request->getPost('fakultas'),
            'program_studi' => $this->request->getPost('program_studi'),
            'role_id' => $this->request->getPost('role_id'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        session()->setFlashdata('success', 'User berhasil diupdate.');
        return redirect()->to('/dashboard/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('success', 'User berhasil dihapus.');
        return redirect()->to('/dashboard/users');
    }
}
