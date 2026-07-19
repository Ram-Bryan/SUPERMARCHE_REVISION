<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaisseModel;
use CodeIgniter\HTTP\ResponseInterface;

class CaisseController extends BaseController
{

    public function choix(){
        $model = new CaisseModel();
        $caisses = $model->findAll();
        $data = [
            'caisses' => $caisses
        ];
        return view('caisse/choix', $data);
    }

    public function valider(){
        $caisseId = $this->request->getGet("caisse");

        $model = new CaisseModel();
        $caisse = $model->find($caisseId);

        if (!$caisse) {
            session()->setFlashdata('error', 'Caisse non trouve');
            return redirect()->to('caisse/choix');
        }

        session()->set('caisse', $caisse);

        return view('caisse/achat');
    }
}
