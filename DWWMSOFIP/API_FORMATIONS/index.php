<?php
require_once("./api.php");

// On va devoir utiliser une réécriture d'URL pour se servir de notre API.
// A l'origine notre adresse de site ressemblera à ca :
// www.monsite.fr/formations
// Il faut donc transformé l'url pour qu'elle ressemble plutot à ca
// www.monsite.fr/index.php?demande=formations ( format que l'on connait bien car format de la methode GET avec les info dans l'url)

// Les points d'entrée de l'application seront

// www.monsite.fr/formations (liste de toute les formations)
// www.monsite.fr/formations/:categorie ( PHP JAVASCRIPT...) (les des formations de la categorie donnée)
// www.monsite.fr/formation/:id (6,7) (information sur la formation avec l'id correspondant)
try {
    // Si apres la réécriture d'url la demande n'est pas vide
    if (!empty($_GET['demande'])) {
        // On separe la demande car le get peut etre : cas A "fomations" ou cas B "formations/php" ou  Cas C "formation/2"
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        // On switch sue les différentes possibilités
        switch ($url[0]) {
                // cas ou la première partie de la demande est egale à formations cas A ou cas B
            case "formations":
                // si la deuxieme partie est vide alors cas A sinon cas B
                if (empty($url[1])) {
                    // on demande la liste de toutes les formations
                    getFormations();
                } else {
                    // on demande la liste des formations de la categorie saisie
                    getFormationsByCategorie($url[1]);
                }
                break;
                // cas ou la première partie de la demande est egale à formation cas C
            case "formation":
                // Si l'id de la formation saisie n'est pas vide
                if (!empty($url[1])) {
                    getFormationById($url[1]);
                } else {
                    // on leve une exception pour indiquer à l'utilisateur l'erreur
                    throw new Exception("Vous n'avez pas renseigné le numéro de formation");
                }
                break;
                // cas par defaut forcement demande pas valide donc levée d'execption
            default:
                throw new Exception("La demande n'est pas valide, vérifiez l'url");
        }
    } else {
        throw new Exception("Problème de récupération de données.");
    }
} catch (Exception $e) {
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}



/* Explication du fichier htaccess

RewriteEngine On                                => signifique que la regle de reecriture est activé

RewriteCond %{REQUEST_FILENAME} !-f             => la condition suivante demande que le nom du fichier à renommé ne soit pas un fichier physique style .txt
RewriteCond %{REQUEST_FILENAME} !-d             => la condition suivante demande que le nom du fichier à renommé ne soit pas un dossier 

RewriteRule ^(.*)$ index.php?demande=$1         => la regle de récriture on prend tout ^(.*)$ "expression reguliere" et on transforme en index.php?demande=$1
                                                => $1 correspond à tout ce qui se trouvera apres le /
exemple  www.monsite.fr/formations sera re ecrit avec  www.monsite.fr/index.php?demande=formations

*/
