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

    public function login()
    {

        $email = $this->request->getPost('email');
        $mdp = $this->request->getPost('mdp');

        $caissierModel = new CaissierModel();
        $caissier = $caissierModel->getCaissierByEmail($email);

        if ($caissier != null) {
            
            if (password_verify($mdp, $caissier['mot_de_passe'])) {

                session()->set([
                    'id_caissier'=>$caissier['id_caissier'],
                    'email'=>$caissier['email'],
                    'isLoggedIn'=>true,
                ]);
            
                return redirect()->to("/caisse/choix")->with("success", "'Credentials verified successfully'");

            } else {
                return redirect()->to("/")->with('error', 'Email ou Mot de passe incorrect');
            }

        } else {
            return redirect()->to("/")->with('error', 'Email ou Mot de passe incorrect');
        }

    }
}
