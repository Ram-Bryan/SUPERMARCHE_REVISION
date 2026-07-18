<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatDetailsModel extends Model
{
    protected $table = 'achat_details';
    protected $primaryKey = 'id_detail';

    protected $returnType = 'array';

    protected $allowedFields = [
        'id_achat',
        'id_produit',
        'quantite',
        'prix_unitaire'
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;
}