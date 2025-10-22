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

### Syntaxe

### Typographie

### Logique
| Bug | Correction | Explication |
| :----- | :------ | :------  |
|``` if(is_null($article) OR !!!!count($article)) ``` |``` if(is_null($article) OR !count($article)) ``` | Simplification de la quadruple négation !!!! qui vaut affirmation en simple négation |


## Tests fonctionnels manuels

## Bilan et perspectives
