<?php

/**
 * Permet la connexion d'un utilisateur
 * @param string $email
 * @param string $password
 * @return bool
 */
function login(string $email, string $password): bool
{
    global $dbh;
    $sql = "SELECT * FROM user WHERE email = :email";
    $query = $dbh->prepare($sql);
    $query->bindValue('email', $email);
    $query->execute();

    # Récupération d'un user dans la bdd depuis son email.
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        # Ici, l'utilisateur a bien été trouvé et son mdp correspond.
        # Je vais stocker ses informations en session
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

/**
 * Déconnexion
 * @return true
 */
function logout(): bool
{
    unset($_SESSION['user']);
    return true;
}