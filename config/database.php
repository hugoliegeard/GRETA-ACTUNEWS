<?php

# Documentation PDO : https://www.php.net/manual/fr/pdo.connections.php

try {
    # Création de la connexion à notre BDD
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

    # Permet de demander à PHP/PDO de retourner les erreurs SQL, à désactiver en production.
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    # Permet de demander à PHP/PDO de retourner les résultats sous forme de tableaux associatifs.
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    # En cas d'erreur, celle-ci est capturé par le catch et affiché à l'utilisateur.
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
