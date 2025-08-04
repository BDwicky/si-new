<?php

namespace App\Controllers;

class ErrorPage extends BaseController
{
    public function aksesDitolak()
    {
        return view('errors/akses_ditolak');
    }
}
