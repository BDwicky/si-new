<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function strukturUKM()
    {
        $data = [
            'title' => 'Struktur UKM',
            'active_menu' => 'struktur-ukm'
        ];
        return view('dashboard/admin/struktur-ukm', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'active_menu' => 'dashboard'
        ];
        return view('dashboard/admin/index', $data);
    }

    public function kalender()
    {
        $data = [
            'title' => 'Kalender Agenda UKM',
            'active_menu' => 'kalender'
        ];
        return view('dashboard/admin/kalender', $data);
    }

    public function listAnggota()
    {
        $data = [
            'title' => 'List Anggota UKM',
            'active_menu' => 'list-anggota'
        ];
        return view('dashboard/admin/list-anggota', $data);
    }

    public function pendaftar()
    {
        $data = [
            'title' => 'List Pendaftar Anggota UKM',
            'active_menu' => 'pendaftar'
        ];
        return view('dashboard/admin/pendaftar', $data);
    }

    public function tempt()
    {
        $data = [
            'title' => 'Temporary Page',
            'active_menu' => 'tempt'
        ];
        return view('dashboard/admin/tempt', $data);
    }
}
