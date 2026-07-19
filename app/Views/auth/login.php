<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php } ?>

    <form id="login" method="post" action="<?= base_url("login") ?>">
        <?= csrf_field() ?>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="caissier@gmail.com">

        <label for="mdp">Mot de passe:</label>
        <input type="text" name="mdp" id="mdp">

        <input type="submit" value="Se connecter" value="caissier123">

    </form>

</body>

<!-- 
<script>
    const loginForm = document.querySelector("#login");

    loginForm.addEventListener('submit', async (e) => {
        const email = document.querySelector("#email").value;
        const mdp = document.querySelector("#mdp").value;

        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: {
                email: email,
                mdp: mdp
            }
        });
    })

</script> -->

</html>