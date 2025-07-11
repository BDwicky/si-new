<?php
namespace App\Controllers;

class SuperAdmin extends BaseController
{
    public function index()
    {
        return view('dashboard/super-admin/index', ['title' => 'Dashboard']);
    }

    public function ukm()
    {
        return view('dashboard/super-admin/ukm', ['title' => 'Ukm']);
    }

}