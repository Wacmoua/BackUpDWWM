<?php

// On va verfier que l'utilisateur n'est pas deja connecté et s'il est deja connecté on le renvoit sur son profil

// première étape recuperer les données transmises par le formulaire par la méthode POST si les données existes
// sinon on affiche un message d'erreur et on renvoit l'utilisateur sur la page de connexion



// On stocke les données des différents POST dans des variables pour les controler ensuite (on va verifier qu'elles correspondent
// au format attendu en base de données et qu'elles soient cohérentes)
// On fait doublon avec le controle qui est effectué coté FRONT en javascript par securité supplémentaire

// On va devoir se connecter à la base de données et envoyer la requette en BDD
// On va creer notre connexion


// On va creer notre requete puis la préparer et l'executer


// Si le login et le pass sont ok on donne accés à la page du User( user_profil.php ) Sinon on renvoit l'utilisateur à la page de connexion
// au passage on va ouvrir une session pour transmettre des informations de l'utilisateur 

// Axe d'améliorations possible (verifier si l'utilisateur existe en base et s'il n'existe pas lui proposer de s'inscrire)