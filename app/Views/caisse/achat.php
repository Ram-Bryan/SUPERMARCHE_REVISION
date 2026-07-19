<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Effectuer vos achats ici</h1>
<p>Caissier = <?= session()->get('caissier')['email']; ?></p>
<p>Caisse = <?= session()->get('caisse')['libelle']; ?></p>
    
</body>
</html>