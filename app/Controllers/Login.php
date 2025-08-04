<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        // Cek apakah user sudah login
        if ($session->get('id_user')) {
            $session->setFlashdata('message', 'Anda sudah login');

            // Redirect berdasarkan role
            switch ($session->get('role')) {
                case 1:
                    return redirect()->to('dashboard/admin');
                case 2:
                    return redirect()->to('dashboard/ukm');
                case 3:
                    return redirect()->to('dashboard/user');
                default:
                    return redirect()->to('/');
            }
        }

        return view('login/index');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session server-side
            $session->set([
                'id_user' => $user['id'],
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role_id'],
                'logged_in' => true
            ]);

            // Redirect berdasarkan role
            switch ($user['role_id']) {
                case 1:
                    return redirect()->to('dashboard/admin')->with('success', 'Login berhasil.');
                case 2:
                    return redirect()->to('dashboard/ukm/list-anggota')->with('success', 'Login berhasil.');
                case 3:
                    return redirect()->to('dashboard/user')->with('success', 'Login berhasil.');
                default:
                    return redirect()->to('/')->with('error', 'Role tidak dikenali.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah!');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();  // Hapus semua session

        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }

    public function redirectDashboard()
    {
        $session = session();

        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $role = $session->get('role');

        switch ($role) {
            case 1:
                return redirect()->to('/dashboard/admin');
            case 2:
                return redirect()->to('/dashboard/ukm');
            case 3:
                return redirect()->to('/dashboard/user');
            default:
                return redirect()->to('/akses-ditolak');
        }
    }
}
