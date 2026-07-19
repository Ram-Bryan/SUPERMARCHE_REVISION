<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';

    protected $returnType = 'array';

    protected $allowedFields = [
        'nom'
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;

    public function findByNom($nom)
    {
        return $this->where('nom', $nom)->first();
    }
}
