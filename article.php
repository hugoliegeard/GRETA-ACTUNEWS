<!-- EN-TETE DE PAGE -->
<?php

# Chargement du header
require_once 'partials/header.php';

# Si le slug n'existe pas, redirection vers la page d'accueil.
if (!isset($_GET['slug'])) redirect('index.php');

# Récupération de mon article
$post = getOnePostBySlug($_GET['slug']);

?>

<!-- TITRE DE LA PAGE -->
<div class="p-3 mx-auto text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php include_once 'partials/notification.php' ?>
                <h1 class="display-4"><?= $post['title'] ?></h1>
                <img src="<?= generateUrl("assets/uploads/posts/".$post['image']) ?>"
                     class="img-fluid"
                     alt="<?= $post['title'] ?>">
            </div>
        </div>
    </div>
</div>

<!-- CONTENU DE LA PAGE -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= $post['content'] ?>
            </div> <!-- ./col-md-4 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
</div> <!-- ./bg-light -->

<!-- PIED DE PAGE -->
<?php require_once 'partials/footer.php' ?>
