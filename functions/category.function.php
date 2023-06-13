<?php

/**
 * Retourne toutes les
 * catégories du site.
 */
function getCategories(): bool|array
{
    # Récupération de la connexion à la BDD depuis l'espace global PHP
    global $dbh;

    # J'effectue ma requête de récupération des catégories
    $query = $dbh->query('SELECT * FROM category');

    # Je retourne le résultat
    return $query->fetchAll();
}

/**
 * Récupérer une catégorie via son SLUG
 * @param string $slug
 * @return mixed
 */
function getCategoryBySlug(string $slug): mixed
{
    global $dbh;

    # Rédaction de la requête SQL
    $sql = 'SELECT * FROM category WHERE slug = :slug';

    # Préparation de notre requête SQL
    $query = $dbh->prepare($sql);

    # Associer les paramètres avec leurs valeurs
    $query->bindValue(':slug', $slug, PDO::PARAM_STR);

    # Execution et retour du résultat
    $query->execute();
    return $query->fetch();
}
