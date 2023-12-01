<?php
require_once "database.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));


// Fonction pour obtenir la liste des formations
function getFormations()
{
    // On se connecte à la base de données
    $pdo = connectDb();

    // On écrit la requete qui sera necessaire à l'obtention des informations.
    // On a besoin de l'id de la formation, son nom, sa description, son logo et le nom de la catégorie dont elle fait partie.
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' 
    from formation f 
    inner join categorie c 
    on f.categorie_id = c.id";

    // On prépare la requete pour des mesure de sécurité et on l'execute pour recuperer les informations.
    $statement = $pdo->prepare($req);
    $statement->execute();

    // on recupere les informations par le fetchall et on les stocke dans une variable de type tableau 
    $formations = $statement->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($formations); $i++) {
        // on formate l'url de l'image au passage.
        $formations[$i]['image'] = URL . "images/" . $formations[$i]['image'];
    }
    // On libere la requete et on se deconnecte de la base de données.
    $statement->closeCursor();
    $pdo = disconnectDb();

    // on lance la fonction de transformations des résultats au format JSON
    returnJSON($formations);
}
// Fonction pour obtenir la liste des formations d'une catégorie choisie
function getFormationsByCategorie($categorie)
{
    $pdo = connectDb();

    // ecriture de la requete SQL avec un parametre nommé pour la catégorie (autre methode qu'avec le point d'interrogation)


    // Préparation de la requete

    // utilisation du parametre nommé au lieu du numero de parametre que l'on utilisait avec le point d'interrogation et execution


    // Récupération des informations de la base de données avec le fetchAll et redefinition de l'url de l'image comme dans la fonction précedente


    // fermetur de la requete et deconnexion

    // fonction pour le retour en JSON des informations

}

function getFormationById($id)
{
    // ecriture de la requete SQL avec un parametre nommé pour la catégorie (autre methode qu'avec le point d'interrogation)


    // Préparation de la requete

    // utilisation du parametre nommé au lieu du numero de parametre que l'on utilisait avec le point d'interrogation et execution


    // Récupération des informations de la base de données avec le fetch et redefinition de l'url de l'image comme dans la fonction précedente


    // fermetur de la requete et deconnexion

    // fonction pour le retour en JSON des informations
}

function returnJSON($infos)
{
    // On ajoute les entetes pour indiquer qu'on accepte les requetes provenant de n'importe quelle origine.
    header("Access-Control-Allow-Origin: *");
    // On precise que le format de la page PHP retournée sera du type application et avec le format JSON
    header("Content-Type: application/json");
    // on "affiche" dans le corp de la page les infos qui au passage sont encoder en JSON pour qu'on respecte le format de données.
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
