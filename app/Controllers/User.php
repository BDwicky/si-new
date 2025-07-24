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

    // Ambil semua UKM yang diikuti user beserta status keanggotaan
    $data['ukms'] = $this->ukmModel
        ->select('ukm.id, ukm.name,  ukm_members.status')
        ->join('ukm_members', 'ukm_members.ukm_id = ukm.id AND ukm_members.user_id = ' . $userId, 'left')
        ->findAll();

    return view('dashboard/user/index', $data);
}



}