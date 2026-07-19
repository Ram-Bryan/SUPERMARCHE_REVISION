<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table = 'caisse';
    protected $primaryKey = 'id_caisse';

    protected $returnType = 'array';

    protected $allowedFields = [
        'numero',
        'libelle'
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;

    public function getCaisseByLibelle($libelle){
        return $this->where('libelle', $libelle)->first();
    }

}