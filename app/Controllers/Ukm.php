<?php

namespace App\Controllers;


use App\Models\UserModel;
use App\Models\UkmModel;
use CodeIgniter\Controller;

class Ukm extends BaseController
{
    protected $userModel;
    protected $ukmModel;
    protected $db;


    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->userModel = new UserModel();
        $this->ukmModel = new UkmModel();
    }


    public function daftarUkm()
    {
        $ukms = $this->db->table('ukm')
            ->get()
            ->getResultArray();

        // Hitung jumlah anggota approved untuk setiap UKM
        foreach ($ukms as &$ukm) {
            $ukm['jumlah_anggota'] = $this->db->table('ukm_members')
                ->where('ukm_id', $ukm['id'])
                ->where('status', 'approved')
                ->countAllResults();
        }

        $ukms = $this->db->table('ukm')
            ->get()
            ->getResultArray();

        // Hitung jumlah anggota approved untuk setiap UKM
        foreach ($ukms as &$ukm) {
            $ukm['jumlah_anggota'] = $this->db->table('ukm_members')
                ->where('ukm_id', $ukm['id'])
                ->where('status', 'approved')
                ->countAllResults();
        }

        $data = [
            'title' => 'Daftar UKM',
            'active_menu' => 'daftar-ukm',
            'ukms' => $ukms // <--- Tambahkan ini
        ];


        return view('dashboard/admin/ukm', $data);
    }

    public function strukturUKM()
    {
        $data = [
            'title' => 'Struktur UKM',
            'active_menu' => 'struktur-ukm'
        ];
        return view('dashboard/ukm/struktur-ukm', $data);
    }


    public function kalender()
    {
        $data = [
            'title' => 'Kalender Agenda UKM',
            'active_menu' => 'kalender'
        ];
        return view('dashboard/ukm/kalender', $data);
    }



    public function listAnggota()
    {
        $userId = session()->get('id_user');

        // Ambil UKM yang dimiliki oleh user
        $ukm = $this->db->table('ukm')
            ->select('id')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        // Cek apakah user punya UKM
        if ($ukm) {
            // Ambil semua anggota dari UKM tersebut
            $anggota = $this->db->table('ukm_members')
                ->select('ukm_members.id AS id_member, users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.status_in_ukm,ukm_members.created_at')
                // ->select('users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')
                ->join('users', 'users.id = ukm_members.user_id')
                ->where('ukm_members.ukm_id', $ukm->id)
                ->where('ukm_members.status', 'approved')
                ->get()
                ->getResultArray();
        } else {
            $anggota = [];
        }

        $data = [
            'title' => 'List Anggota UKM',
            'active_menu' => 'list-anggota',
            'anggota' => $anggota
        ];


        return view('dashboard/ukm/list-anggota', $data);
    }



    public function pendaftar()
    {
        $userId = session()->get('id_user');

        // Cek UKM mana yang dimiliki user ini
        $ukm = $this->db->table('ukm')
            ->select('id')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        $anggota = [];

        if ($ukm) {
            // Ambil semua pendaftar (status pending) dari UKM tersebut
            $anggota = $this->db->table('ukm_members')
                ->select('ukm_members.id AS id_member, users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')

                // ->select('users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')
                ->join('users', 'users.id = ukm_members.user_id')
                ->where('ukm_members.ukm_id', $ukm->id)
                ->where('ukm_members.status', 'pending')
                ->get()
                ->getResultArray();
        }

        $userId = session()->get('id_user');

        // Cek UKM mana yang dimiliki user ini
        $ukm = $this->db->table('ukm')
            ->select('id')
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        $anggota = [];

        if ($ukm) {
            // Ambil semua pendaftar (status pending) dari UKM tersebut
            $anggota = $this->db->table('ukm_members')
                ->select('ukm_members.id AS id_member, users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')

                // ->select('users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')
                ->join('users', 'users.id = ukm_members.user_id')
                ->where('ukm_members.ukm_id', $ukm->id)
                ->where('ukm_members.status', 'pending')
                ->get()
                ->getResultArray();
        }

        $data = [
            'title' => 'List Pendaftar Anggota UKM',
            'active_menu' => 'pendaftar',
            'anggota' => $anggota
        ];


        return view('dashboard/ukm/pendaftar', $data);
    }



    public function tempt()
    {
        $data = [
            'title' => 'Temporary Page',
            'active_menu' => 'tempt'
        ];
        return view('dashboard/ukm/tempt', $data);
    }

    public function detail($id)
    {
        $ukm = $this->ukmModel->find($id);

        if (!$ukm) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("UKM tidak ditemukan.");
        }

        // Hitung jumlah anggota yang disetujui
        $jumlahAnggota = $this->db->table('ukm_members')
            ->where('ukm_id', $id)
            ->where('status', 'approved')
            ->countAllResults();

        $data = [
            'title' => 'Detail UKM',
            'active_menu' => 'daftar-ukm',
            'ukm' => $ukm,
            'jumlah_anggota' => $jumlahAnggota
        ];

        return view('dashboard/ukm/detail-ukm', $data);
    }

    public function daftar($ukm_id)
    {
        // Cek apakah user login
        if (!session()->has('id_user')) {
            return redirect()->to('/login')->with('error', 'Silakan login untuk mendaftar ke UKM.');
        }

        $user_id = session()->get('id_user');

        // Cek apakah user sudah pernah mendaftar ke UKM ini
        $existing = $this->db->table('ukm_members')
            ->where('user_id', $user_id)
            ->where('ukm_id', $ukm_id)
            ->get()
            ->getRow();

        if ($existing) {
            return redirect()->back()->with('error', 'Kamu sudah mendaftar ke UKM ini.');
        }

        // Simpan ke database
        $this->db->table('ukm_members')->insert([
            'user_id' => $user_id,
            'ukm_id' => $ukm_id,
            'status' => 'pending',
            'role_in_ukm' => 'anggota',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar! Menunggu persetujuan.');
    }

    public function setujuiAnggota()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\UkmMemberModel();
        $model->update($id, ['status' => 'approved']);

        return $this->response->setJSON(['success' => true]);
    }

    public function tolakAnggota()
    {
        $id = $this->request->getPost('id');
        $model = new \App\Models\UkmMemberModel();
        $model->update($id, ['status' => 'rejected']);

        return $this->response->setJSON(['success' => true]);
    }

    public function activate($id)
{
    $model = new \App\Models\UkmMemberModel();
    $model->update($id, ['status_in_ukm' => 'active']);
    return redirect()->back()->with('message', 'Anggota diaktifkan.');
}

public function deactivate($id)
{
    $model = new \App\Models\UkmMemberModel();
    $model->update($id, ['status_in_ukm' => 'deactive']);
    return redirect()->back()->with('message', 'Anggota dinonaktifkan.');
}

// Tampilkan form edit jabatan
public function editJabatan($id)
{
    $model = new \App\Models\UkmMemberModel();
    $anggota = $model
        ->select('ukm_members.*, users.name as nama_user')
        ->join('users', 'users.id = ukm_members.user_id')
        ->find($id);

    if (!$anggota) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $data = [
        'title' => 'Edit Jabatan',
        'anggota' => $anggota
    ];

    return view('dashboard/ukm/edit_jabatan', $data);
}

public function updateJabatan($id)
{
    $model = new \App\Models\UkmMemberModel();
    $jabatan = $this->request->getPost('role_in_ukm');

    $model->update($id, ['role_in_ukm' => $jabatan]);

    return redirect()->to('/dashboard/ukm/list-anggota')->with('success', 'Jabatan berhasil diperbarui.');
}



}
