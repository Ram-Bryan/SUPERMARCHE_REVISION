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

    public function getCaissierByEmailAndMdp($email, $mdp){

        $caissier = $this->where('email', $email)->first();
        if ($caissier) {
            if (password_verify($mdp, $caissier['mot_de_passe'])) {
                return $caissier;
            }
        } else {
            return null;
        }

    }
}