<?php
    session_start();

    define('TL_ROOT', dirname(__DIR__));
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json');
    define('DB_USERS', TL_ROOT.'/db/users.json');

    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            $users = getUsersFromJson();
            if($users && is_array($users)) {
                foreach($users as $user) {

                    if($user['login'] === $login && $user['password'] === $password) {
                        
                        return array(
                            'user_id' => $user['id'],
                            'username' => $user['username'],
                            'authenticated' => true,
                            'login_time' => time()
                        );
                    }
                }
            }
        }
        return null;
    }

    function getUsersFromJson(){
        if(file_exists(DB_USERS)) {
            $contenu_json = file_get_contents(DB_USERS);
            return json_decode($contenu_json, true);
        }
        return null;
    }

    function setDisconnectUser(){
         unset($_SESSION['User']);
         session_destroy();
    }

    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            include TL_ROOT.'/pages/index.php';
        }else{
            include $fichier;
        }
    }

    function getArticlesFromJson(){
        if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            return json_decode($contenu_json, true);
        }

        return null;
    }

    function getArticleById($id_article = null){
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
