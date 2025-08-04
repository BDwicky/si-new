<?php

namespace App\Models;

use CodeIgniter\Model;

class UkmModel extends Model
{
    protected $table = 'ukm';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'user_id',
        'deskripsi',
        'kategori',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
