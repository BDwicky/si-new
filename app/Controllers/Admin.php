<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UkmModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $userModel;
    protected $ukmModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ukmModel = new UkmModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('dashboard/admin/index', $data);
    }
    
    // public function listUkm()
    // {
    //     $data['ukms'] = $this->ukmModel->findAll();
    //     return view('dashboard/admin/ukm', $data);
    // }

public function listUkm()
{
    $data['ukms'] = $this->ukmModel
        ->select('ukm.id, ukm.name, ukm.created_at, COUNT(ukm_members.id) as jumlah_anggota')
        ->join('ukm_members', "ukm_members.ukm_id = ukm.id AND ukm_members.status = 'approved'", 'left')
        ->groupBy('ukm.id')
        ->findAll();

    return view('dashboard/admin/ukm', $data);
}



    public function create()
    {
        return view('dashboard/admin/create');
    }

    public function store()
    {
        try {
            $role_id = $this->request->getPost('role_id');

            // Data dasar (wajib)
            $data = [
                'username' => $this->request->getPost('username'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'role_id' => $role_id,
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            // Tambahkan data khusus jika role mahasiswa (3)
            if ($role_id == '3') {
                $data['nim'] = $this->request->getPost('nim');
                $data['fakultas'] = $this->request->getPost('fakultas');
                $data['program_studi'] = $this->request->getPost('program_studi');
            }

            // Simpan user dulu
            $this->userModel->save($data);
            $userId = $this->userModel->insertID(); // DAPATKAN ID USER BARUSAN

            // Jika role UKM, tambahkan data ke tabel ukm
            if ($role_id == '2') { // asumsi 2 = UKM
                $this->ukmModel->insert([
                    'name' => $this->request->getPost('name'), // atau bisa pakai field ukm_name khusus
                    'user_id' => $userId
                ]);
            }

            session()->setFlashdata('success', 'User berhasil ditambahkan.');
        } catch (\Exception $e) {
            log_message('error', 'Gagal tambah user: ' . $e->getMessage());
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
    $role_id = $this->request->getPost('role_id');

    // Data dasar
    $data = [
        'username' => $this->request->getPost('username'),
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'role_id' => $role_id,
    ];

    // Update password jika diisi
    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    // Hanya isi data mahasiswa jika role = 3
    if ($role_id == '3') {
        $data['nim'] = $this->request->getPost('nim');
        $data['fakultas'] = $this->request->getPost('fakultas');
        $data['program_studi'] = $this->request->getPost('program_studi');
    } else {
        // Kalau bukan mahasiswa, kosongkan supaya tidak menyebabkan duplikat NIM
        $data['nim'] = null;
        $data['fakultas'] = null;
        $data['program_studi'] = null;
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
