<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UkmModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    protected $userModel;
    protected $ukmModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->ukmModel = new UkmModel();
    }

public function index()
{
    $data = [
        'title' => 'User Page',
        'active_menu' => 'UKM Saya',
    ];

    $userId = session()->get('id_user');

    // Ambil semua UKM yang diikuti user, termasuk status dan status_in_ukm
    $ukms = $this->ukmModel
        ->select('ukm.id, ukm.name, ukm_members.status, ukm_members.status_in_ukm')
        ->join('ukm_members', 'ukm_members.ukm_id = ukm.id AND ukm_members.user_id = ' . $userId)
        ->findAll();

    // Filter UKM yang statusnya approved dan status_in_ukm-nya aktiv
    $acceptedUKMs = [];
    foreach ($ukms as $ukm) {
        if ($ukm['status'] === 'approved' && $ukm['status_in_ukm'] === 'active') {
            $acceptedUKMs[] = $ukm;
        }
    }

    // Kirim data ke view
    $data['ukms'] = $ukms;
    $data['acceptedUKMs'] = $acceptedUKMs;

    return view('dashboard/user/index', $data);
}


    public function editProfile()
    {
        $userId = session()->get('id_user');
        $user = $this->userModel->find($userId);

        // Tambahkan pengambilan data UKM seperti di index()
        $ukms = $this->ukmModel
            ->select('ukm.id, ukm.name, ukm_members.status')
            ->join('ukm_members', 'ukm_members.ukm_id = ukm.id AND ukm_members.user_id = ' . $userId)
            ->findAll();

        $acceptedUKMs = [];
        foreach ($ukms as $ukm) {
            if ($ukm['status'] === 'approved') {
                $acceptedUKMs[] = $ukm;
            }
        }

        $data = [
            'title' => 'Edit Profil',
            'active_menu' => 'Edit Profile', // samakan ejaannya dengan di view
            'user' => $user,
            'ukms' => $ukms,
            'acceptedUKMs' => $acceptedUKMs,
        ];


        return view('dashboard/user/edit_profile', $data);
    }


    public function updateProfile()
    {
        $userId = session()->get('id_user');

        $data = [
            'username'       => $this->request->getPost('username'),
            'email'          => $this->request->getPost('email'),
            'name'           => $this->request->getPost('name'),
            'nim'            => $this->request->getPost('nim'),
            'phone'          => $this->request->getPost('phone'),
            'fakultas'       => $this->request->getPost('fakultas'),
            'program_studi'  => $this->request->getPost('program_studi'),
        ];

        // Jika password diisi, update password juga
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($userId, $data);

        session()->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to('/dashboard/user');
    }
}
