<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AchatDetailsModel;
use App\Models\AchatModel;
use App\Models\CaisseModel;
use App\Models\CaissierModel;
use App\Models\ClientModel;
use App\Models\ProduitModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProduitCsv extends BaseController
{
    public function export()
    {
        // prendre les trucs
        $model = new ProduitModel();
        $produits = $model->findAll();

        // convention
        $filename = "export.csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $file = fopen('php://output', 'w');

        // ajouter une ligne au csv
        fputcsv($file, ['id', 'designation', 'prix', 'stock']);

        foreach ($produits as $produit) {
            fputcsv($file, [$produit['id_produit'], $produit['designation'], $produit['prix'], $produit['quantite_stock']]);
        }

        fclose($file);
        exit;
    }

    public function exportAdvanced()
    {
        $model = new AchatModel();
        $rows = $model->getDetailOfAllAchat();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="achats.csv"');
        $file = fopen('php://output', 'w');

        // CSV header
        fputcsv($file, [
            'Achat',
            'Client',
            'Caisse',
            'Caissier',
            'Date',
            'Statut',
            'Produit',
            'Quantité',
            'Prix unitaire'
        ]);

        foreach ($rows as $row) {
            fputcsv($file, [
                $row['id_achat'],
                $row['client'],
                $row['caisse'],
                $row['caissier'],
                $row['date_achat'],
                $row['statut'],
                $row['produit'],
                $row['quantite'],
                $row['prix_unitaire']
            ]);
        }

        fclose($file);
        exit;
    }

    // si y a les meme colonnes que la table
    public function import()
    {
        $file = $this->request->getFile('csv_file');

        if (!$file->isValid()) {
            return redirect()->back()
                ->with('error', 'Fichier invalide');
        }

        $handle = fopen($file->getTempName(), 'r');

        // Skip header
        fgetcsv($handle);

        $model = new ProduitModel();

        while (($row = fgetcsv($handle)) !== false) {
            $model->insert([
                'designation' => $row[0],
                'prix' => $row[1],
                'quantite_stock' => $row[2]
            ]);
        }

        fclose($handle);
        return redirect()->back()
            ->with('success', 'Import terminé');
    }

    public function importAdvanced()
    {
        $file = $this->request->getFile('csv_file');

        if (!$file->isValid()) {
            return redirect()->back()
                ->with('error', 'Fichier invalide');
        }

        $handle = fopen($file->getTempName(), 'r');
        $clientModel    = new ClientModel();
        $caisseModel    = new CaisseModel();
        $caissierModel  = new CaissierModel();
        $produitModel   = new ProduitModel();
        $achatModel     = new AchatModel();
        $detailModel    = new AchatDetailsModel();

        // Skip header
        fgetcsv($handle);

        // CSV Achat ID => Database Achat ID
        $achats = [];

        while (($row = fgetcsv($handle)) !== false) {

            $csvAchatId = trim($row[0]);
            $clientNom = trim($row[1]);
            $numeroCaisse = trim($row[2]);
            $emailCaissier = trim($row[3]);
            $date = trim($row[4]);
            $statut = trim($row[5]);
            $designationProduit = trim($row[6]);
            $quantite = (int) $row[7];
            $prix = (float) $row[8];

            // Retrieve foreign keys
            $client = $clientModel->findByNom($clientNom);
            $caisse = $caisseModel->findByNumero($numeroCaisse);
            $caissier = $caissierModel->getCaissierByEmail($emailCaissier);
            $produit = $produitModel->findByDesignation($designationProduit);

            if (!$client || !$caisse || !$caissier || !$produit) {
                continue;
            }

            // Creer l'achat
            // Il faut un achat unique donc on regarde si il n existe pas encore dans achat
            if (!isset($achats[$csvAchatId])) {
                $achatModel->insert([
                    'id_client'    => $client['id_client'],
                    'id_caisse'    => $caisse['id_caisse'],
                    'id_caissier'  => $caissier['id_caissier'],
                    'date_achat'   => $date,
                    'statut'       => $statut
                ]);

                $achats[$csvAchatId] = $achatModel->insertID();
            }

            // Inserer le detail
            $detailModel->insert([
                'id_achat'      => $achats[$csvAchatId],
                'id_produit'    => $produit['id_produit'],
                'quantite'      => $quantite,
                'prix_unitaire' => $prix
            ]);
        }

        fclose($handle);
        return redirect()->back()
            ->with('success', 'Import terminé');
            
    }
}
