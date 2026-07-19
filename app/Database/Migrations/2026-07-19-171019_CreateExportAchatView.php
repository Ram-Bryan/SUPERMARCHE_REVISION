<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExportAchatView extends Migration
{
    public function up()
    {
        // Drop the view if it already exists
        $this->db->query("DROP VIEW IF EXISTS v_export_achat");

        // Create the view
        $sql = "CREATE VIEW v_export_achat AS
                SELECT
                    a.id_achat,
                    c.nom AS client,
                    ca.numero AS caisse,
                    cs.email AS caissier,
                    a.date_achat,
                    a.statut,
                    p.designation AS produit,
                    ad.quantite,
                    ad.prix_unitaire,
                    ad.quantite * ad.prix_unitaire AS montant
                FROM achat a
                JOIN achat_details ad ON a.id_achat = ad.id_achat
                JOIN produit p ON p.id_produit = ad.id_produit
                JOIN client c ON c.id_client = a.id_client
                JOIN caisse ca ON ca.id_caisse = a.id_caisse
                LEFT JOIN caissier cs ON cs.id_caissier = a.id_caissier";

        $this->db->query($sql);
    }

    public function down()
    {
        // Drop the view
        $this->db->query("DROP VIEW IF EXISTS v_export_achat");
    }
}