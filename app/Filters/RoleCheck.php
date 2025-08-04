<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika $arguments diisi, maka batasi berdasarkan role
        if ($arguments) {
            $allowedRoles = $arguments; // contoh ['1'], ['2'], ['3']

            if (!in_array((string)$session->get('role'), $allowedRoles)) {
                return redirect()->to('/akses-ditolak')->with('error', 'Akses ditolak!');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong
    }
}
