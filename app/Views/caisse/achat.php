<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(session()->has('success')) {?>
    <?= session('success') ?>
<?php } ?>

<h1>Effectuer vos achats ici</h1>
<p>Caissier = <?= session()->get('email'); ?></p>
<p>Caisse = <?= session()->get('caisse_libelle'); ?></p>

<a href="<?= base_url('produit/pdf') ?>">Telecharger pdf produit</a>
<a href="<?= base_url('produit/csv/export') ?>">Generate CSV simple a partir de la DB</a>
<a href="<?= base_url('produit/csv/exportAdvanced') ?>">Generate CSV complexe a partir de la DB</a>

<h1>Importer un csv simple</h1>
<form action="<?= base_url('produit/csv/import') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="file" name="csv_file" accept=".csv">
    <button type="submit">Importer</button>
</form>

<h1>Importer un csv complexe</h1>
<form action="<?= base_url('produit/csv/importAdvanced') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="file" name="csv_file" accept=".csv">
    <button type="submit">Importer</button>
</form>

</body>
</html>