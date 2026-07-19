<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Choisissez la caisse</h1>

    <?php if (session()->has('error')) { ?>
        <div class="alert alert-danger">
            <?= session('error')?>
        </div>
    <?php } ?>  

    <?php if (session()->has('success')) { ?>
        <div class="success success-danger">
            <?= session('success')?>
        </div>
    <?php } ?>  

    <form action="<?= base_url("caisse/valider") ?>" method="get">
        <select name="caisse" id="caisse">
            <?php foreach ($caisses as $caisse) { ?>
                <option value="<?= $caisse['id_caisse'] ?>"> <?= $caisse['libelle'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Choisir la caisse">
    </form>
    
</body>
</html>