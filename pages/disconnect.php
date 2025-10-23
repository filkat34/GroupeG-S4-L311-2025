<?php
setDisconnectUser();

header('Location:index.php'); //correction du chemin
exit(); // ajout exit après header pour arrêter l'exécution du script
