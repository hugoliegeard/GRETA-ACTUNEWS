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

/**
 * Permet d'insérer un nouvel article
 * dans la base de donnée.
 * @param string $title
 * @param string $slug
 * @param int $id_category
 * @param int $id_user
 * @param string $content
 * @param string $image
 * @return false|string
 */
function insertPost(string $title, string $slug, int $id_category, int $id_user, string $content, string $image): bool|string
{
    global $dbh;
    $sql = "INSERT INTO post (title, slug, id_category, id_user, content, image, createdAt, publishedAt) VALUES (:title, :slug, :id_category, :id_user, :content, :image, :createdAt, :publishedAt)";
    $query = $dbh->prepare($sql);
    $query->bindValue('title', $title, PDO::PARAM_STR);
    $query->bindValue('slug', $slug);
    $query->bindValue('id_category', $id_category, PDO::PARAM_INT);
    $query->bindValue('id_user', $id_user, PDO::PARAM_INT);
    $query->bindValue('content', $content);
    $query->bindValue('image', $image);
    $query->bindValue('createdAt', (new DateTime())->format('Y-m-d H:i:s'));
    $query->bindValue('publishedAt', (new DateTime())->format('Y-m-d H:i:s'));

    # Si l'article a bien été inséré, je retourne son ID, sinon faux.
    return $query->execute() ? $dbh->lastInsertId() : false;
}
