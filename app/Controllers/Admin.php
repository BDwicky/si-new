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
                    'name' => $data['name'], // atau bisa pakai field ukm_name khusus
                    'deskripsi' => $this->request->getPost('deskripsi'), // default jika kosong
                    'kategori' => $this->request->getPost('kategori'),
                    'name' => $data['name'], // atau bisa pakai field ukm_name khusus
                    'deskripsi' => $this->request->getPost('deskripsi'), // default jika kosong
                    'kategori' => $this->request->getPost('kategori'),
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

        $ukmData = null;

        // Jika user adalah role UKM, ambil data UKM-nya
        if ($user['role_id'] == '2') {
            $ukmData = $this->ukmModel->where('user_id', $id)->first();
        }

        $data = [
            'user' => $user,
            'ukm' => $ukmData
        ];

        return view('dashboard/admin/edit_user', $data);
    }


    public function update($id)
    {
        $role_id = $this->request->getPost('role_id');
    {
        $role_id = $this->request->getPost('role_id');

        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'role_id' => $role_id,
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Mahasiswa
        if ($role_id == '3') {
            $data['nim'] = $this->request->getPost('nim');
            $data['fakultas'] = $this->request->getPost('fakultas');
            $data['program_studi'] = $this->request->getPost('program_studi');
        } else {
            $data['nim'] = null;
            $data['fakultas'] = null;
            $data['program_studi'] = null;
        }

        // Simpan data user
        $this->userModel->update($id, $data);

        // Jika role UKM, update juga tabel UKM
        if ($role_id == '2') {
            $deskripsi = $this->request->getPost('deskripsi');
            $kategori = $this->request->getPost('kategori');

            $existingUkm = $this->ukmModel->where('user_id', $id)->first();

            if ($existingUkm) {
                // Update
                $this->ukmModel->update($existingUkm['id'], [
                    'deskripsi' => $deskripsi,
                    'kategori' => $kategori,
                    'name' => $data['name'],
                ]);
            } else {
                // Insert jika belum ada
                $this->ukmModel->insert([
                    'user_id' => $id,
                    'name' => $data['name'],
                    'deskripsi' => $deskripsi,
                    'kategori' => $kategori,
                ]);
            }
        }

        return redirect()->to(base_url('dashboard/admin'))->with('success', 'User berhasil diupdate.');
    }
        return redirect()->to(base_url('dashboard/admin'))->with('success', 'User berhasil diupdate.');
    }


    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('dashboard/admin'))->with('success', 'Data berhasil dihapus.');
    }
};
