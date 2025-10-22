<?php
session_start();

define('TL_ROOT', dirname(__DIR__));
define('LOGIN', 'UEL311');
define('PASSWORD', 'U31311');
define('DB_ARTICLES', TL_ROOT . '/db/articles.json'); // correction chemin

function connectUser($login = null, $password = null)
{
    if (!is_null($login) && !is_null($password)) {
        if ($login === LOGIN && $password === PASSWORD) {
            return array(
                'login'    => LOGIN,
                'password' => PASSWORD
            );
        }
    }
    return null;
}

function setDisconnectUser()
{
    unset($_SESSION['User']);
    session_destroy(); // correction erreur de syntaxe
}

function isConnected()
{
    if (
        array_key_exists('User', $_SESSION)
        && !is_null($_SESSION['User'])
        && !empty($_SESSION['User'])
    ) {
        return true;
    }
    return false;
}

function getPageTemplate($page = null)
{
    $fichier = TL_ROOT . '/pages/' . (is_null($page) ? 'index.php' : $page . '.php');

    if (!file_exists($fichier)) {
        include TL_ROOT . '/pages/index.php'; //correction erreur de syntaxe
    } else {
        include $fichier;
    }
}

function getArticlesFromJson()
{
    if (file_exists(DB_ARTICLES)) // correction erreur de syntaxe file_exsits et DB_ARTICLES
    {
        $contenu_json = file_get_contents(DB_ARTICLES); // correcteur erreur syntaxe DB_ARTICLES
        return json_decode($contenu_json, true);
    }

    return null;
}

function getArticleById($id_article = null)
{ // correction erreur de syntaxe, pas une condition
    if (file_exists(DB_ARTICLES)) { // correction erreur de syntaxe DB_ARTICLES
        $contenu_json = file_get_contents(DB_ARTICLES); //correction erreur de syntaxe DB_ARTICLES
        $_articles    = json_decode($contenu_json, true);

        foreach ($_articles as $article) {
            if ($article['id'] == $id_article) {
                return $article;
            }
        }
    }

    return null;
}
