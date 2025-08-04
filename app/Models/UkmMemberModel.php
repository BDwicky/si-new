<?php

namespace App\Models;

use CodeIgniter\Model;

class UkmMemberModel extends Model
{
    protected $table = 'ukm_members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ukm_id', 'user_id', 'status', 'role_in_ukm'];
}
