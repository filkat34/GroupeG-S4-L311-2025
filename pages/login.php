<?php
    // Initialisation de la variable pour les divers messages
	$message = null;

    // Traitement du formulaire de connexion
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Vérification de la présence des champs login et password
	    if(array_key_exists('login', $_POST) && array_key_exists('password', $_POST)){
            // On vérifie que les champs ne sont pas vides
	    	if(!empty($_POST['login']) && !empty($_POST['password'])){
                // On connecte l'utilisateur
	    		$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']);

                // Si la connexion a réussi, on redirige vers l'accueil
	    		if(!is_null($_SESSION['User'])){
	    			header("Location:index.php");
                    exit(); // Arrêt du script après la redirection
	    		}else{
	    			$message = "Mauvais login ou mot de passe"; // Message d'erreur si la connexion a échouée
	    		}
	    	}
	    }
	}	
?>

<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a>
				</header>
				<div class="content">
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>