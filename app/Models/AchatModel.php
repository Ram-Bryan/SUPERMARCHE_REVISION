<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table = 'achat';
    protected $primaryKey = 'id_achat';

    protected $returnType = 'array';

    protected $allowedFields = [
        'id_client',
        'id_caisse',
        'id_caissier',
        'date_achat',
        'statut'
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;

    public function getDetailOfAllAchat()
    {
        $query = $this->query("SELECT * FROM v_export_achat");
        return $query->getResultArray();
    }
}
