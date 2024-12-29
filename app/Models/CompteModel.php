<?php

namespace App\Models;

use CodeIgniter\Model;

class CompteModel extends Model
{
    protected $table = 'compte';
    protected $primaryKey = 'id_compte';
    protected $allowedFields = ['email', 'password', 'id_user'];
}
?>