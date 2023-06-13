<?php

/**
 * Récupérer tous les articles de la base
 */
function getPosts($limit = null): bool|array
{
    global $dbh;

    # Création de la requête SQL
    $sql = 'SELECT p.id,
                   p.title,
                   p.content,
                   p.publishedAt,
                   p.slug as postSlug,
                   p.image,
                   c.name,
                   c.slug as categorySlug,
                   u.firstname,
                   u.lastname
                FROM post p
                     INNER JOIN user u ON u.id = p.id_user
                     INNER JOIN category c ON c.id = p.id_category
                        ORDER BY p.publishedAt DESC';

    # Si une "limit" est précisé, alors je l'ajoute à la requête
    $limit !== null ? $sql .= " LIMIT $limit" : '';

    # Execution de la requête
    $query = $dbh->query($sql);

    # Retour du résultat
    return $query->fetchAll();
}

function getPostsByCategory($categoryId): bool|array
{
    global $dbh;

    # Création de la requête SQL
    $sql = 'SELECT p.id,
                   p.title,
                   p.content,
                   p.publishedAt,
                   p.slug as postSlug,
                   p.image,
                   c.name,
                   c.slug as categorySlug,
                   u.firstname,
                   u.lastname
                FROM post p
                     INNER JOIN user u ON u.id = p.id_user
                     INNER JOIN category c ON c.id = p.id_category
                        WHERE p.id_category = :categoryId
                        ORDER BY p.publishedAt DESC';

    # Preparation de la requête
    $query = $dbh->prepare($sql);
    $query->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);

    # Execution de la requête
    $query->execute();

    # Retour du résultat
    return $query->fetchAll();
}

/**
 * Permet de récupérer un article via son slug
 * @param string $slug
 * @return mixed
 */
function getOnePostBySlug(string $slug): mixed
{
    global $dbh;

    # Création de la requête SQL
    $sql = 'SELECT p.id,
                   p.title,
                   p.content,
                   p.publishedAt,
                   p.slug as postSlug,
                   p.image,
                   c.name,
                   c.slug as categorySlug,
                   u.firstname,
                   u.lastname
                FROM post p
                     INNER JOIN user u ON u.id = p.id_user
                     INNER JOIN category c ON c.id = p.id_category
                        WHERE p.slug = :slug
                        ORDER BY p.publishedAt DESC';

    # Preparation de la requête
    $query = $dbh->prepare($sql);
    $query->bindValue(':slug', $slug, PDO::PARAM_STR);

    # Execution de la requête
    $query->execute();

    # Retour du résultat
    return $query->fetch();
}