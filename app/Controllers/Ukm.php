<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UkmModel;
use CodeIgniter\Controller;

class Ukm extends BaseController
{   
    protected $userModel;
    protected $ukmModel;

    public function __construct()
    {
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
        $data = [
            'title' => 'List Anggota UKM',
            'active_menu' => 'list-anggota'
        ];
        return view('dashboard/ukm/list-anggota', $data);
    }

    public function pendaftar()
    {
        $data = [
            'title' => 'List Pendaftar Anggota UKM',
            'active_menu' => 'pendaftar'
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
