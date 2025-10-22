<?php
// Activation de l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //suppression E_STRICT car compris dans E_ALL avec PHP8

include 'inc/inc.functions.php'; // erreur de syntaxe
include 'inc/inc.css.php'; // regroupement pour segmentation code
?>

<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Story by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper" class="divided">
		<?php
		getPageTemplate( //correction erreur de syntaxe fonction
			array_key_exists('page', $_GET) ? $_GET['page'] : null //erreur de syntaxe
		);
		?>
		<?php include 'inc/tpl-footer.php'; // correction chemin fichier
		?>
	</div>

	<?php include 'inc/inc.js.php'; // erreur de syntaxe 
	?>

</body>

</html>