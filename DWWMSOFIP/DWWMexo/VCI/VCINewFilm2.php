<?php
require_once "config/config.php";
require_once "config/database.php";
$titreFilm = "";
$idRealisateur = "";
$categorieFilm = "";
$anneeFilm = "";
$afficheFilm = "";
$resumeFilm = "";


// Récuperation des informations passées en POST
// Contôle de la valeur du POST si null ou vide renvoie vers la page d'ou provient le submit
if (isset($_POST["Titre_Film"]) && ($_POST["Titre_Film"] != "")) {
    $titreFilm = $_POST["Titre_Film"];
} else {
    // renvoie vers la page précedente avec un message d'erreur
}

if (isset($_POST["ListeRealisateurFilm"]) && ($_POST["ListeRealisateurFilm"] != "default")) {
    $idRealisateur = $_POST["ListeRealisateurFilm"];
    // ATTENTION ON RECUPERE UN STRING IL FAUT LE CONVERTIR EN INT
    $idRealisateur = intval($idRealisateur);
} else {
    // renvoie vers la page précedente avec un message d'erreur
}

if (isset($_POST["ListeTypeFilm"]) && ($_POST["ListeTypeFilm"] != "default")) {
    $categorieFilm = $_POST["ListeTypeFilm"];
} else {
    // renvoie vers la page précedente avec un message d'erreur
}


if (isset($_POST["Annee_Film"]) && ($_POST["Annee_Film"] != "")) {
    $anneeFilm = $_POST["Annee_Film"];
    $anneeFilm = intval($anneeFilm);
} else {
    // renvoie vers la page précedente avec un message d'erreur
}

if (isset($_POST["Affiche_Film"]) && ($_POST["Affiche_Film"] != "")) {
    $afficheFilm = $_POST["Affiche_Film"];
} else {
    // renvoie vers la page précedente avec un message d'erreur
}

if (isset($_POST["Resume_Film"]) && ($_POST["Resume_Film"] != "")) {
    $resumeFilm = $_POST["Resume_Film"];
} else {
    // renvoie vers la page précedente avec un message d'erreur
}


// connection à la base
$db = connectDb();
// ecriture de la requete pour INSERER LE FILM
$sqlRequest1 = "INSERT INTO film (ID_FILM, TITRE_FILM, ID_REALIS, CODE_TYPE_FILM, ANNEE_FILM, REF_IMAGE, RESUME) VALUES (NULL,?,?,?,?,?,?)";
// Préparation et execution de la requete
$sqlResponse1 = $db->prepare($sqlRequest1);


$sqlResponse1->bindParam(1, $titreFilm);
$sqlResponse1->bindParam(2, $idRealisateur);
$sqlResponse1->bindParam(3, $categorieFilm);
$sqlResponse1->bindParam(4, $anneeFilm);
$sqlResponse1->bindParam(5, $afficheFilm);
$sqlResponse1->bindParam(6, $resumeFilm);

$sqlResponse1->execute() or die(var_dump($sqlResponse1->errorInfo()));

// recupération des informations 
$resultInsertFilm = $sqlResponse1->rowCount();

//deconnexiond de la base
$db = disconnectDb();
?>

<!-- 
PARTIE GESTION DE L'AFFICHAGE
-->

<?php
include("entete.php");
?>
<div class="container-fluid">
    <?PHP
    include("VCITitre.php");
    titreSite();
    ?>
    <div class="row">
        <?PHP
        include("VCIMenuAdmin.html");
        ?>
        <div class="col-12 col-md-10">
            <div id="tete">
                <h4 class="text-center">REPONSE DE LA BDD</h4>
            </div>
            <div id="corps" class="text-center">
                <?php
                if ($resultInsertFilm > 0) {
                    echo ('<h4> votre film a bien été ajouté ! </h4>');
                } else {
                    echo ('<h4>Il y a eu un soucis veuillez contacter un mec plus qualifié</h4>');
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include("pied.php");
?>