<?php
namespace App\Controllers;

class DetailUkm extends BaseController
{
    public function index()
    {
        return view('detail-ukm/index', ['title' => 'Detail UKM']);
    }
}