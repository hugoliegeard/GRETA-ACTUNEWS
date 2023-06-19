<?php

    # Importation des constantes
    require_once 'config/config.php';

    # Importation de la connexion à la BDD
    require_once 'config/database.php';

    # Importation des fonctions de notre site
    require_once 'functions/global.function.php';
    require_once 'functions/category.function.php';
    require_once 'functions/post.function.php';

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actunews - Votre site web d'actualité !</title>
    <!-- Chargement de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
</head>
<body>

<!-- NAVIGATION -->
<?php require_once 'nav.php' ?>