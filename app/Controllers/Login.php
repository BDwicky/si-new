<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;



class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Set session
                $session->set([
                    'id_user' => $user['id_user'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'logged_in' => true
                ]);
                return redirect()->to('/')->with('success', 'Login berhasil.'); // Save State Login
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda sudah logout.');
    }
}
