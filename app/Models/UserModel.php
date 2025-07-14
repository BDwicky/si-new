<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'name',
        'email',
        'nim',
        'phone',
        'fakultas',
        'program_studi',
        'role_id',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
