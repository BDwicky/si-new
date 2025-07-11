<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
    }

    public function index()
    {
        // $data['mahasiswa'] = $this->mahasiswa->findAll();
        //return view('mahasiswa/index', $data);
        return view('mahasiswa/index', ['title' => 'Beranda']);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        $this->mahasiswa->save([
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/mahasiswa');
    }

    public function edit($id)
    {
        $data['mahasiswa'] = $this->mahasiswa->find($id);
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $this->mahasiswa->update($id, [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        $this->mahasiswa->delete($id);
        return redirect()->to('/mahasiswa');
    }
}
