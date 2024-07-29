<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table            = 'driver';
    protected $primaryKey       = 'id';

    protected $useTimestamps    = false;
    protected $allowedFields    = ['nama_driver', 'nohp', 'status'];
}
