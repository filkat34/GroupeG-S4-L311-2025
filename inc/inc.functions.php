<?php
    // Démarage de la session
    session_start();

    // Constantes globales du site
    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT .'/db/articles.json');

    /**
     * Fonction pour l'authentification de l'utilisateur
     * Vérifie si les identifiants fournis correspondent aux constantes définies
     * @param string|null $login Identifiant de l'utilisateur
     * @param string|null $password Mot de passe
     * @return array|null Données utilisateur si authentification réussie, null sinon
     */
    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            if($login === LOGIN && $password === PASSWORD){
                return array(
                    'login'    => LOGIN,
                    'password' => PASSWORD
                );
            }
        }
        return null;
    }

    /**
     * Fonction pour la déconnexion de l'utilisateur
     * Supprime les données de session et détruit la session
     */
    function setDisconnectUser(){
         unset($_SESSION['User']);
         session_destroy();
    }

    /**
     * Vérifie si un utilisateur est actuellement connecté
     * @return bool True si connecté, false sinon
     */
    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    /**
     * Charge et affiche le template de la page demandée
     * Si la page n'existe pas, charge la page d'accueil par défaut
     * @param string|null $page Nom de la page à charger
     */
    function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        // On vérifie si le fichier existe
        if(!file_exists($fichier)){
            include TL_ROOT. '/pages/index.php'; // On affiche la page par défaut si le fichier n'existe pas
        }else{
            include $fichier; // Inclusion de la page demandée
        }
    }

    /**
     * Charge tous les articles depuis le fichier JSON
     * @return array|null Tableau des articles ou null si erreur
     */
    function getArticlesFromJson(){
        if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES); // Lecture du fichier JSON
            return json_decode($contenu_json, true); // Conversion en tableau associatif
        }

        return null;
    }

    /**
     * Récupère un article spécifique par son ID
     * @param int|null $id_article ID de l'article recherché
     * @return array|null Article trouvé ou null si non trouvé
     */
    function getArticleById($id_article = null){
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES); // Lecture du fichier JSON
            $_articles    = json_decode($contenu_json, true); // Conversion en tableau associatif

           // On parcourt les articles pour trouver celui avec l'ID qui correspond
            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
