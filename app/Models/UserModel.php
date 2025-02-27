<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';

    protected $useTimestamps    = false;
    protected $allowedFields    = ['nama_user', 'username', 'nohp', 'email', 'password', 'role'];
}
