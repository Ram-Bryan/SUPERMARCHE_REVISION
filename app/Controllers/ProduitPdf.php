<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProduitModel;
use CodeIgniter\HTTP\ResponseInterface;

require_once APPPATH . 'ThirdParty/fpdf186/fpdf.php';

class ProduitPdf extends BaseController
{
    public function generate() {

        $model = new ProduitModel();
        $produits = $model->findAll();

        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);

        // Header
        $pdf->Cell(70, 10, 'Nom Produit', 1);
        $pdf->Cell(70, 10, 'Prix Produit', 1);
        $pdf->Cell(70, 10, 'Quantite en stock', 1);
        $pdf->Ln();

        // Cells
        $pdf->SetFont('Arial', '', 12);
        foreach($produits as $produit) {
            $pdf->Cell(70, 10, $produit['designation'], 1);
            $pdf->Cell(70, 10, $produit['prix'] . " Ar", 1);
            $pdf->Cell(70, 10, $produit['quantite_stock'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'produits.pdf');
    }
}
