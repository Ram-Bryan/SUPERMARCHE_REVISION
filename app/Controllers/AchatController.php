<?php

namespace App\Controllers;

use App\Models\AchatModel;
use App\Models\ProduitModel;
use App\Models\CaissierModel;
use App\Models\CaisseModel;
use App\Models\ClientModel;
use App\Models\AchatDetailsModel;

class AchatController extends BaseController
{
    protected $produitModel;
    protected $caisseModel;
    protected $utilisateurModel;
    protected $clientModel;
    protected $achatModel;
    protected $achatDetailsModel;
    protected $db;


    public function __construct()
    {
        $this->produitModel = new ProduitModel();
        $this->caisseModel = new CaisseModel();
        $this->utilisateurModel = new CaissierModel();
        $this->clientModel = new ClientModel();
        $this->achatModel = new AchatModel();
        $this->achatDetailsModel = new AchatDetailsModel();

        $this->db = \Config\Database::connect();
    }


    /**
     * Afficher la liste des produits
     */
    public function listesProduits()
    {
        $data['produits'] = $this->produitModel->findAll();

        return view('achat/saisie', $data);
    }



    /**
     * Enregistrer un achat
     */
    public function saveAchats()
    {

        $id_client = $this->request->getPost('id_client');
        $id_caisse = $this->request->getPost('id_caisse');
        $id_caissier = $this->request->getPost('id_caissier');

        $id_produit = $this->request->getPost('id_produit');
        $quantite = $this->request->getPost('quantite');


        // récupérer le produit
        $produit = $this->produitModel
                        ->where('id_produit',$id_produit)
                        ->first();


        // insertion dans achat
        $achat = [
            'id_client' => $id_client,
            'id_caisse' => $id_caisse,
            'id_caissier'=> $id_caissier
        ];


        $this->achatModel->insert($achat);


        // récupérer l'id achat créé
        $id_achat = $this->achatModel->getInsertID();



        // insertion dans achat_details
        $detail = [
            'id_achat' => $id_achat,
            'id_produit' => $id_produit,
            'quantite' => $quantite,
            'prix_unitaire' => $produit['prix']
        ];


        $this->achatDetailsModel->insert($detail);



        return redirect()->to('/achat');
    }




    /**
     * Liste des achats d'un client
     */
    public function listesAchatsClients()
    {

        $id_client = $this->request->getGet('id_client');


        $data['achats'] = $this->achatModel
            ->where('id_client',$id_client)
            ->findAll();


        return view('achat/liste',$data);
    }

}