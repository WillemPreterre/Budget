<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/style.css">
    <?php require_once 'help.php'; ?>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-persoUn">
        <a class="navbar-brand" href="index.php">
            <img src="img/3516563.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Bootstrap
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/add_user.php">Ajout users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/revenu_plus.php">Ajout revenu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/depense_plus.php">Ajout dépense</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user_list.php">liste des users</a>
                </li>
            </ul>
        </div>
    </nav>
</header>