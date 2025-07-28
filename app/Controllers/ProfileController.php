<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function edit()
    {
        $userModel = new UserModel();
        $userId = session()->get('id'); // pastikan session menyimpan ID saat login
        $user = $userModel->find($userId);

        return view('profile/edit', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('id');

        $data = $this->request->getPost();

        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']); // agar tidak menimpa password lama
        }

        $userModel->update($userId, $data);
        return redirect()->to('/profile/edit')->with('success', 'Profil berhasil diperbarui');
    }
}
