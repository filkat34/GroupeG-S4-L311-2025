# Simple and minimalist fake blog - UE L311 - Semaine 4 - Groupe G

## 📚 Sommaire

- 👥 [Membres du groupe](#membres-du-groupe)
- 🎯 [Objectifs](#objectifs)
- 🤝 [Travail collaboratif](#travail-collaboratif)
  - 🛠️ [Outils](#outils)
  - 📋 [Principe général](#principe-général)
- 🗓️ [Planning de la semaine](#planning-de-la-semaine)
- 🐞 [Méthodes de débogage employées](#méthodes-de-débogage-employées)
- 🗃️ [Typologie des erreurs](#typologie-des-erreurs)
  - 📄 [Fichiers](#fichiers)
  - 🧩 [Syntaxe](#syntaxe)
  - 🔡 [Typographie](#typographie)
  - 📐 [Logique](#logique)
- 🧪 [Tests fonctionnels manuels](#tests-fonctionnels-manuels)
- 📈 [Bilan et perspectives](#bilan-et-perspectives)

## Membres du groupe

| Etudiant.e  |  Alias      |  Branche      |    
| :----------:|:-----------:| :-----------:|
| Mathilde C. | Clouddy23   | bugfix/mathilde |
| Kamo G.     | Spaghette5  | bugfix/kamo |
| Mathieu L.  | mathleys    | bugfix/mathieu | 
| Filippos K. | filkat34    | bugfix/filippos |

## Objectifs
- [x] Mobiliser les méthodes de déboggage de code PHP abordées en classe virtuelle pour rendre le site d'un blog fonctionnel.
- [x] Savoir utiliser le client git et la plateforme Github en vue de collaborer au sein d'une équipe de développement.

## Travail collaboratif

### Outils

### Principe général

## Planning de la semaine

## Méthodes de débogage
Pour identifier et corriger les problèmes, plusieurs méthodes de debug ont été employées :


## Typologie des erreurs
Nous avons établi ci-dessous une typologie des erreurs trouvées avec quelques exemples pour chacune d'entre elles. Il s'agit bien d'une typologie et non d'une liste exhaustive de toutes les erreurs corrigées.

### Fichiers
| Bug | Correction | Explication |
| :----- | :------ | :------  |
|```define('DB_ARTICLES', TL_ROOT.'/dbal/articles.json');``` |```define('DB_ARTICLES', TL_ROOT.'/db/articles.json');``` |Correction du chemin de dossier de _/dbal/_ vers _db_ pour correspondre à la structure réelle du projet |
|``` include 'inc/tpls-footer.php';``` |``` include 'inc/tpl-footer.php'``` | Correction du nom de fichier (suppression du 's')|
|```header('Location:indx.php') ``` |```header('Location:index.php')``` | Correction du nom du fichier (ajout du 'e') |

### Syntaxe
| Bug | Correction | Explication |
| :----- | :------ | :------  |
|``` function getArticleById($id_article == null) ``` |``` function getArticleById($id_article = null)``` | Remplacement de l'opérateur de comparaison == par l'assignation =|
|```##$compteur++; ``` |``` $compteur++;``` |Suppression du commentaire empêchant l’exécution du code |

### Typographie
Les erreurs typographiques (fautes de frappe) ont été les plus nombreuses. Parmi celles-ci, on retrouve surtout des coquilles dans les noms des variables et des fonctions.

| Bug | Correction | Explication |
| :----- | :------ | :------  |
|```<?php includ 'inc/inc.functions.php'; ?> ``` |``` <?php include 'inc/inc.functions.php'; ?>``` | Ajout du _e_ à _include_ |
|``` if($_SERVER["RQUEST_METHOD"] == "POST"``` |``` if($_SERVER["REQUEST_METHOD"] == "POST")``` | Correction du nom de la variable superglobale (ajout du _e_ à _REQUEST_ |
|``` sessions_destroy()``` |``` session_destroy()``` | Rectification de la faute de frappe dans l’appel de la fonction (suppression du _s_) |
|```<img src="<?php echo $art_icle['image'];?>" alt="" />``` |```<img src="<?php echo $article['image'];?>" alt="" />``` | Correction du nom de la variable (suppression du _ )|


### Logique
| Bug | Correction | Explication |
| :----- | :------ | :------  |
|``` if(is_null($article) OR !!!!count($article)) ``` |``` if(is_null($article) OR !count($article)) ``` | Simplification de la quadruple négation !!!! qui vaut affirmation en simple négation |
|``` connectUser($_GET['login'], $_POST['password'])``` |``` connectUser($_POST['login'], $_POST['password'])``` | Correction de GET en POST car il s’agit d’envoyer des données vers le serveur pour vérifier si les identifiants sont corrects|


## Tests fonctionnels manuels

## Bilan et perspectives
