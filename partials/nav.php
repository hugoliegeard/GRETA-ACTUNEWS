<?php

    # -- Récupération des catégories
    $categories = getCategories();
    // print_r( $categories );

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Actunews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <?php foreach ($categories as $category) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="categorie.php?name=<?= $category ?>">
                            <?= $category ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="text-right">
                <a href="#" class="nav-item btn btn-outline-info">Connexion</a>
                <a href="#" class="nav-item btn btn-outline-warning mx-2">Inscription</a>
            </div>
        </div> <!-- #/navbarNav -->
    </div> <!-- ./container-fluid -->
</nav> <!-- ./nav -->