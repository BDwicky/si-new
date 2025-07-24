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
            
            if ($session->get('role') == 2) {
                return redirect()->to('dashboard/ukm');
            }

            if ($session->get('role') == 3) {
                return redirect()->to('dashboard/user');
            }

            return redirect()->to('dashboard/admin');
        }
        return view('login/index');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();
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

            // Redirect ke dashboard admin
            return redirect()->to(base_url('dashboard/admin'))->with('success', 'Login berhasil.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah!');
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah!');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();  // Hapus semua session

        return redirect()->to(base_url('/'))->with('success', 'Berhasil logout.');
        $session = session();
        $session->destroy();  // Hapus semua session

        return redirect()->to(base_url('/'))->with('success', 'Berhasil logout.');
    }
}
