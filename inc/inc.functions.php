<?php
    // Secure session configuration
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_samesite', 'Strict');
    
    session_start();

    define('TL_ROOT', dirname(__DIR__));
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json');
    define('DB_USERS', TL_ROOT.'/db/users.json');

    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            $users = getUsersFromJson();
            
            if($users && isset($users['users'])) {
                foreach($users['users'] as $user) {
                    if($user['active'] && 
                       password_verify($login, $user['login_hash']) && 
                       password_verify($password, $user['password_hash'])) {
                        
                        return array(
                            'user_id' => $user['id'],
                            'username' => $user['username'],
                            'role' => $user['role'],
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
            
            // Check session timeout (1 hour = 3600 seconds)
            if(isset($_SESSION['User']['login_time'])) {
                $session_duration = time() - $_SESSION['User']['login_time'];
                if($session_duration > 3600) {
                    // Session expired, destroy it
                    setDisconnectUser();
                    return false;
                }
            }
            
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
