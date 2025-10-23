<?php 
	$message = null;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(array_key_exists('secure_data', $_POST) && !empty($_POST['secure_data'])){
			$decodedData = base64_decode($_POST['secure_data']);
			$credentials = json_decode($decodedData, true);
				
			if($credentials && isset($credentials['login']) && isset($credentials['password'])) {
				$_SESSION['User'] = connectUser($credentials['login'], $credentials['password']);
				
				if(!is_null($_SESSION['User'])){
					header("Location:index.php");
					exit();
				} else {
					$message = "Mauvais login ou mot de passe";
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
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
				</header>
				<div class="content">
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					<form method="post" action="#" id="simpleSecureForm">
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
						
						<!-- Champ caché pour sauvegarder les données cryptées à transmettre au serveur -->
						<input type="hidden" name="secure_data" id="secure_data" />
						
						<ul class="actions">
							<li><input type="submit" name="login_btn" id="submitBtn" value="Se connecter" /></li>
						</ul>
					</form>

					<script>
					// Gestion de la soumission sécurisée du formulaire
					document.addEventListener('DOMContentLoaded', function() {
						const form = document.getElementById('simpleSecureForm');
						
						form.addEventListener('submit', function(e) {
							e.preventDefault();
							
							const login = document.getElementById('login').value;
							const password = document.getElementById('password').value;
							
							if (!login || !password) {
								alert('Veuillez remplir tous les champs !');
								return;
							}
							
							// Transformation des données en JSON
							const data = JSON.stringify({login: login, password: password});
							
							// Encodage en Base64 faute de mieux
							document.getElementById('secure_data').value = btoa(data);

							// Effacement des champs sensibles
							document.getElementById('login').value = '';
							document.getElementById('password').value = '';
							
							form.submit();
							
						});
					});
					</script>
				</div>
			</section>
		</div>
	</div>
</section>