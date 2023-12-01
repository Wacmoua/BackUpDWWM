<?php
// On va verfier que l'utilisateur n'est pas deja connecté et s'il est deja connecté on le renvoit sur son profil

// première étape recuperer les données transmises par le formulaire d'inscription par la méthode POST si les données existes
// sinon on affiche un message d'erreur et on renvoit l'utilisateur sur la page d'inscription


// On stocke les données des différents POST dans des variables pour les controler ensuite (on va verifier qu'elles correspondent
// au format attendu en base de données et qu'elles soient cohérentes)
// On fait doublon avec le controle qui est effectué coté FRONT en javascript par securité supplémentaire

// On va devoir se connecter à la base de données et envoyer la requette en BDD pour vérifier que l'utilisateur n'esite pas deja.
// (exemple controle que le pseudo ou le mail ne soit pas deja utilisé par un autre utilisateur)

// Pour le mot de passe on ajoute l'étape de cryptage du mot de passe pour respecter les lois sur la sécurité des données privées.

// On va creer notre connexion
// On va creer notre requete puis la préparer et l'executer


// Si toutes les informations sont ok on va se reconnecter à la base
// et lui envoyer les informations a stocker pour créer notre utilisateur.

// Si l'insertion en base c'est bien passé on va renvoyer l'utilsateur sur la page de connexion et suivre le processus de connexion
// Sinon on affiche un message d'erreur


// Axe d'améliorations possible (faire une double verification de l'inscription par le biais d'un mail de confirmation)