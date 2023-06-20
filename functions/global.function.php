<?php

session_start(); # Démarrage de la session PHP

/**
 * Permet de vérifier si un user est connecté.
 * @return bool|array
 */
function isAuthenticated(): bool|array
{
    return $_SESSION['user'] ?? false;
}

/**
 * Permet de vérifier le "role" d'un utilisateur
 * @param string $role
 * @return bool
 */
function isGranted(string $role): bool
{
    return isset($_SESSION['user']) && ($role === $_SESSION['user']['roles']);
}

/**
 * Permet de facilité le
 * debug de notre app.
 * @param $debug
 * @return void
 */
function debug($debug): void
{
    echo "<pre>";
    print_r($debug);
    echo "</pre>";
}

/**
 * Debut et coupe l'execution du programme.
 * Dd signifie : dump and die.
 * @param $debug
 * @return void
 */
function dd($debug): void
{
    echo "<pre>";
    print_r($debug);
    echo "</pre>";
    die;
}

/**
 * Permet d'afficher un résumé
 * de x mots à partir d'un texte.
 * @param $text
 * @param int $limit
 * @return string
 */
function summarize($text, int $limit = 80): string
{
    # Suppression des balises HTML
    $string = strip_tags($text);

    # Si mon $string est > $limit (80)
    if (strlen($string) > $limit) {

        # Je coupe ma chaine à la $limit
        $stringCut = substr($string, 0, $limit);

        # Je veux m'assurer de ne pas couper de mot en plein milieu
        $string = substr($stringCut, 0, strrpos($stringCut, ' '));

    }

    # Je retourne le résultat de ma fonction
    return $string . '...';

}

/**
 * Permet de générer un alias à partir d'une
 * chaine de caractère.
 * https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
 * @param $text
 * @param string $divider
 * @return string
 */
function slugify($text, string $divider = '-'): string
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return false;
    }

    return $text;
}

/**
 * Fonction de redirection
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    header("Location: $url");
    exit();
}

/**
 * Permet de générer une url
 * @param string $path
 * @return string
 */
function generateUrl(string $path): string
{
    return BASE_URL . '/' . $path;
}