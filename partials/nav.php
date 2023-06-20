<?php

    # -- Récupération des catégories
    $categories = getCategories();
    // print_r( $categories );

    # Récupération de l'utilisateur connecté
    $user = isAuthenticated();

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
                    <a class="nav-link" href="<?= generateUrl('accueil.html') ?>">Accueil</a>
                </li>
                <?php foreach ($categories as $category) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= generateUrl($category['slug']) ?>">
                            <?= $category['name'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="text-right">
                <?php if ($user) : ?>

                    <span class="navbar-text mx-2">Bonjour <strong><?= $user['firstname'] ?></strong>
                        <em>(<?= $user['roles'] ?>)</em>,</span>

                    <?php if (isGranted('ROLE_ADMIN')) : ?>
                        <a href="<?= generateUrl('mes-articles.php') ?>"
                           class="nav-item btn btn-outline-primary">Mes Articles</a>
                        <a href="<?= generateUrl('admin99562/creer-un-article.html') ?>"
                           class="nav-item btn btn-outline-warning">Créer un Article</a>
                    <?php endif ?>

                    <a href="<?= generateUrl('deconnexion.html') ?>"
                       class="nav-item btn btn-danger">Déconnexion</a>
                <?php else : ?>
                    <a href="<?= generateUrl('connexion.html') ?>"
                       class="nav-item btn btn-outline-info">Connexion</a>
                    <a href="<?= generateUrl('inscription.html') ?>"
                       class="nav-item btn btn-outline-warning">Inscription</a>
                <?php endif ?>
            </div>
        </div> <!-- #/navbarNav -->
    </div> <!-- ./container-fluid -->
</nav> <!-- ./nav -->