<?php

# EN-TETE DE PAGE
require_once 'partials/header.php';

# Etapes de vérification
$email = $password = null;

if (!empty($_POST)) {

    // Affectation automatique des variables
    foreach ($_POST as $key => $value) {
        /*
         * Déclaration dynamique. Permet de
         * déclarer des variables en se basant sur
         * la valeur de la $key.
         */
        $$key = $value;
    }

    # Déclaration du tableau d'erreurs
    $errors = [];
    
    # Vérification du mail
    if (empty($email)) {
        $errors['email'] = "Veuillez entrer un email";
    }

    if (empty($password)) {
        $errors['password'] = "Veuillez entrer un mot de passe";
    }

    # Début du processus de connexion
    if (empty($errors)) {

        if(login($email, $password)) {
            redirect('mes-articles.php');
        }

        $errors['email'] = 'Email / Mot de passe incorrect';

    } // endif empty errors

} // endif empty

?>

<!-- TITRE DE LA PAGE -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Administration</h1>
</div>

<!-- CONTENU DE LA PAGE -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4 mx-auto">
                <form id="loginForm" method="post">
                    <fieldset class="border rounded p-3 shadow-sm bg-white">
                        <h2 class="text-center">Connexion</h2>
                        <?php include_once 'partials/notification.php' ?>
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger mt-4">
                                <?php foreach ($errors as $error) : ?>
                                    <?= $error ?> <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email"
                                   value="<?= $email ?>"
                                   placeholder="Saisissez votre e-mail"
                                   type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" name="password"
                                   value="<?= $password ?>"
                                   placeholder="Saisissez votre mot de passe"
                                   type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Bouton Submit -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark">Connexion</button>
                        </div>
                    </fieldset>
                </form>
            </div> <!-- ./col-md-4 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
</div> <!-- ./bg-light -->

<!-- PIED DE PAGE -->
<?php require_once 'partials/footer.php' ?>
