<?php

# En-tête de page
require_once 'partials/header.php';

#1. Récupération des informations
# Initialisation des variables à null.
$title = $slug = $content = $image = $id_category = $id_user = null;

# $_POST ne peux pas être vide quand l'utilisateur a soumis les données de son formulaire.
if (!empty($_POST)) {

    $title = $_POST['title']; # Contient les données du champ #title
    $slug = slugify($_POST['slug']); # Contient les données du champ #slug
    $content = $_POST['content']; # Contient les données du champ #content
    $id_category = $_POST['id_category']; # Contient les données du champ #id_category
    $id_user = 1; # TODO A remplacer plus tard par l'utilisateur connecté.
    $image = $_FILES['image'];

    #2. Vérification des informations
    # Déclaration d'un tableau d'erreurs
    $errors = [];

    # Vérification du titre
    if (empty($title)) {
        $errors['title'] = "N'oubliez pas le titre de votre article";
    }

    if (!empty($title) && strlen($title) > 255) {
        $errors['title'] = "Votre titre est trop long. Pas plus de 255 caractères";
    }

    # Vérification de l'alias
    if (empty($slug)) {
        $errors['slug'] = "N'oubliez pas l'alias de votre article";
    }

    if (!empty($slug) && strlen($slug) > 255) {
        $errors['slug'] = "Votre alias est trop long. Pas plus de 255 caractères";
    }

    # Vérification du contenu
    if (empty($content)) {
        $errors['content'] = "N'oubliez pas le contenu de votre article";
    }

    # Vérification de la catégorie
    if (empty($id_category)) {
        $errors['id_category'] = "N'oubliez pas la catégorie de votre article";
    }

    #3a. Upload de l'image
    # Emplacement temporaire de l'image
    $tmpName = $image['tmp_name'];

    # Récupération de l'extension de l'image
    $extension = pathinfo($image['name'])['extension'];

    # Je vais renommer mon image
    $fileName = $slug . '.' . $extension;

    # Je vais déterminer ma destination (ou je vais stocker mon image)
    $destination = __DIR__ . '/assets/uploads/posts/' . $fileName;

    # Il nous reste à déplacer le fichier du dossier temporaire vers le dossier de destination
    move_uploaded_file($tmpName, $destination);

    # On va envoyer dans la BDD le nom de l'image
    $image = $fileName;

    #3b. TODO Redimensionner & Compression l'image

    #4. Insertion dans la BDD si je n'ai pas d'erreurs
    if (empty($errors)) {
        $id_post = insertPost($title, $slug, $id_category, $id_user, $content, $image);
        if ($id_post) {
            #5. Redirection vers le nouvel article
            redirect("article.php?slug=$slug");
        }
    }

} // end if empty

?>

<!-- TITRE DE LA PAGE -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Administration</h1>
</div>

<!-- CONTENU DE LA PAGE -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <form id="createPostForm"
                      enctype="multipart/form-data"
                      action="creer-un-article.php" method="post">
                    <fieldset class="border rounded p-3 shadow-sm">
                        <h2 class="text-center">Rédiger un article</h2>

                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger mt-4">
                                <u>Une erreur est survenue dans la validation de vos données : </u> <br>
                                <?php foreach ($errors as $error) : ?>
                                    <?= $error ?> <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input id="title" name="title"
                                   value="<?= $title ?>"
                                   placeholder="Saisissez le titre de votre article"
                                   type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['title'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Alias -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Alias</label>
                            <input id="slug" name="slug"
                                   value="<?= $slug ?>"
                                   placeholder="Saisissez le alias de votre article"
                                   type="text" class="form-control <?= isset($errors['slug']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['slug'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Categorie -->
                        <div class="mb-3">
                            <label for="id_category" class="form-label">Catégorie</label>
                            <select id="id_category" name="id_category"
                                    class="form-select <?= isset($errors['id_category']) ? 'is-invalid' : '' ?>">
                                <option value="0">-- Choisissez une catégorie --</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option <?= $category['id'] == $id_category ? 'selected' : '' ?>
                                            value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['id_category'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu</label>
                            <textarea id="content" name="content"
                                      placeholder="Saisissez le contenu de votre article"
                                      class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>"><?= $content ?></textarea>
                            <div class="invalid-feedback">
                                <?= $errors['content'] ?? '' ?>
                            </div>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Illustration de l'article</label>
                            <input id="image" name="image"
                                   placeholder="Choisissez l'image de votre article"
                                   type="file" class="form-control">
                            <div id="imageHelp" class="form-text">Seul les formats .jpg, .jpeg, .gif, .png sont
                                autorisés jusqu'à une taille maximale de 5Mo.
                            </div>
                        </div>

                        <!-- Bouton Submit -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark">Publier mon article</button>
                        </div>
                    </fieldset>
                </form>
            </div> <!-- ./col-md-4 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
</div> <!-- ./bg-light -->

<!-- PIED DE PAGE -->
<script src="assets/js/creer-un-article.js"></script>
<?php require_once 'partials/footer.php' ?>

