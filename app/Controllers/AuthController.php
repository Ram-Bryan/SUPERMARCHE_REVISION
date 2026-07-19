<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaisseModel;
use App\Models\CaissierModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return view("auth/login");
    }

    public function login() {
        $email = $this->request->getPost('email');
        $mdp = $this->request->getPost('mdp');

        echo $email . " " . $mdp;

        $caissierModel = new CaissierModel();
        $caissier = $caissierModel->getCaissierByEmailAndMdp($email, $mdp);
        if ($caissier != null) {
            session()->set("caissier", $caissier);
            session()->setFlashdata('success', 'Credentials verified successfully');
        } else {
            session()->setFlashdata('error', 'Email ou Mot de passe incorrect');
            // return redirect()->to("/");
        }
        
        // return redirect()->to("/caisse/choix");

    }
}
