<!-- EN-TETE DE PAGE -->
<?php require_once 'partials/header.php' ?>

<?php

#1. Récupération des informations
# Initialisation des variables à null.
$firstname = $lastname = $email = $password = null;
# $_POST ne peut pas être vide quand l'utilisateur a soumis les données de son formulaire d'inscription.
if (!empty($_POST)) {

    $firstname = $_POST['firstname']; # Contient les données du champ #firstname
    $lastname = $_POST['lastname']; # Contient les données du champ #lastname
    $email = $_POST['email']; # Contient les données du champ #email
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); # Contient les données du champ #password

    #2. Vérification des informations
    # Déclaration d'un tableau d'erreurs
    $errors = [];

    # Vérification du Firstname
    if (empty($firstname)) {
        $errors['firstname'] = "N'oubliez pas votre Prénom";
    }

    # Vérification du Lastname
    if (empty($lastname)) {
        $errors['lastname'] = "N'oubliez pas votre Nom";
    }

    # Vérification de votre email
    if (empty($email)) {
        $errors['email'] = "N'oubliez pas votre Email";
    }

    # Vérification de votre password
    if (empty($password)) {
        $errors['password'] = "N'oubliez pas votre mot de passe";
    }

    if (!empty($password) && strlen($password) < 16) {
        $errors['password'] = "Votre mot de passe est trop court. Pas moins de 16 caractères";
    }

    if (empty($errors)) {
        $id_post = insertUser($firstname, $lastname, $email, $password);
        if ($id_post) {
            #5. Redirection vers le nouvel article
            redirect("connexion.php?info=Félicitation votre inscription est effective. Vous pouvez vous connecter.");
        }
    }

} // end if empty

?>

<!-- TITRE DE LA PAGE -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Inscription</h1>
</div>

<!-- CONTENU DE LA PAGE -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-4 mx-auto">
                <form id="register" action="inscription.php" method="post">

                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input id="firstname" name="firstname"
                               value="<?= $firstname ?>"
                               placeholder="Saisissez votre prénom"
                               type="text" class="form-control <?= isset($errors['firstname']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['firstname'] ?? '' ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input id="lastname" name="lastname"
                               value="<?= $lastname ?>"
                               placeholder="Saisissez votre nom"
                               type="text" class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['lastname'] ?? '' ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email"
                               value="<?= $email ?>"
                               placeholder="Saisissez votre email"
                               type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?? '' ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input id="password" name="password"
                               value="<?= $password ?>"
                               placeholder="Saisissez votre mot de passe"
                               type="password"
                               class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['password'] ?? '' ?>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-dark">M'inscrire</button>
                    </div>

                </form>
            </div> <!-- ./col-md-4 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
</div> <!-- ./bg-light -->

<!-- PIED DE PAGE -->
<?php require_once 'partials/footer.php' ?>
