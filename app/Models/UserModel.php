<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'nim',
        'nama_lengkap',
        'email',
        'no_telp',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}
