<?php

namespace App\Models;

use CodeIgniter\Model;

class CaissierModel extends Model
{
    protected $table = 'caissier';
    protected $primaryKey = 'id_caissier';

    protected $returnType = 'array';

    protected $allowedFields = [
        'email',
        'mot_de_passe'
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;
}