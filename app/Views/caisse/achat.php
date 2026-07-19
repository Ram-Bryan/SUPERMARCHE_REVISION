<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Effectuer vos achats ici</h1>
<p>Caissier = <?= session()->get('email'); ?></p>
<p>Caisse = <?= session()->get('caisse_libelle'); ?></p>

<a href="<?= base_url('produit/pdf') ?>">Telecharger pdf produit</a>
    
</body>
</html>