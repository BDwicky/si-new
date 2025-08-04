<?php

namespace App\Controllers;

use App\Models\UkmModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $ukmList = $db->table('ukm')
            ->select('ukm.*, users.name as ketua_ukm')
            ->join('users', 'users.id = ukm.user_id')
            ->get()
            ->getResultArray();

        // Tambahkan jumlah anggota hanya jika datanya ada
        foreach ($ukmList as $key => $ukm) {
            $jumlah = $db->table('ukm_members')
                ->where('ukm_id', $ukm['id'])
                ->where('status', 'approved')
                ->countAllResults();

            $ukmList[$key]['jumlah_anggota'] = $jumlah;
        }

        $data = [
            'title' => 'Beranda UKM',
            'list_ukm' => $ukmList // Sesuaikan dengan variabel yang dipakai di view
        ];

        return view('home', $data);
    }
}
