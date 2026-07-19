```php

check extension:
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
 if ($file_ext == "csv") {

```

export: DB --> csv:

```php


public function produits()
    {
        $model = new ProduitModel();

        $produits = $model->findAll();

        $filename = "produits.csv";

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        $file = fopen('php://output', 'w');

        // CSV header
        fputcsv($file, [
            'ID',
            'Designation',
            'Prix',
            'Stock'
        ]);

        // Data
        foreach ($produits as $produit) {

            fputcsv($file, [
                $produit['id_produit'],
                $produit['designation'],
                $produit['prix'],
                $produit['quantite_stock']
            ]);

        }

        fclose($file);
    }




```


impor: csv--> DB:

```php


namespace App\Controllers;

use App\Models\ProduitModel;

class ProduitController extends BaseController
{

    public function import()
    {
        $file = $this->request->getFile('csv_file');


        if (!$file->isValid()) {
            return redirect()->back()
                ->with('error','Fichier invalide');
        }


        $handle = fopen($file->getTempName(), 'r');


        // Skip header
        fgetcsv($handle);


        $produitModel = new ProduitModel();


        while (($row = fgetcsv($handle)) !== false)
        {

            $produitModel->insert([
                'designation' => $row[0],
                'prix' => $row[1],
                'quantite_stock' => $row[2]
            ]);

        }


        fclose($handle);


        return redirect()->back()
            ->with('success','Import terminé');
    }
}


```