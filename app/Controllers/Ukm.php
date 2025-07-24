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
        $this->userModel = new UserModel();
        $this->ukmModel = new UkmModel();
    }


    public function daftarUkm()
    {
        $data = [
            'title' => 'Daftar UKM',
            'active_menu' => 'daftar-ukm'
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
                ->select('users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')
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
                ->select('users.name AS nama_user, users.nim, users.program_studi, users.fakultas, ukm_members.status, ukm_members.role_in_ukm, ukm_members.created_at')
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
}
