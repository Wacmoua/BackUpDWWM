<?php
// PARTIE TRAITEMENT PHP 
require_once "config/config.php";
require_once "config/database.php";

// Recupération des info passées en post
$idCatFilm = "";

// Contôle de la valeur du POST si null ou vide renvoie vers la page d'ou provient le submit
if (isset($_POST["selectCatFilm"]) || ($_POST["selectCatFilm"] != "")) {
    $idCatFilm = $_POST["selectCatFilm"];
} else {
    header('Location: VCIAccueil.php');
}

// connection à la base
$db = connectDb();
// ecriture de la requete
$sqlRequest = 'SELECT * FROM film join star on star.ID_Star=film.ID_REALIS join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM where typefilm.CODE_TYPE_FILM =\'' . $idCatFilm . '\'';

// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);
$sqlResponse->execute();
// recupération des informations au format objet
$results = $sqlResponse->fetchAll(5);
// deconnexion de la base
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
        include("VCIMenu.html");
        ?>
        <div class="col-12 col-md-10">
            <div id="tete">
                <h4 class="text-center">SELECTIONNEZ VOTRE FILM !</h4>
            </div>
            <div id="corps">
                <table class="table table-bordered border-primary table-sm align-middle">
                    <tr>
                        <th class="text-center">Titre du Film</th>
                        <th class="text-center">Année Sortie</th>
                        <th colspan="2" class="text-center">Réalisateur</th>
                        <th class="text-center">Affiche</th>
                    </tr>
                    <?php
                    foreach ($results as $films) {
                    ?>
                        <tr>
                            <td class="text-center">
                                <a href="VCIResa3.php?ID_FILM=<?= $films->ID_FILM ?>">
                                    <?= $films->TITRE_FILM ?>
                                </a>
                            </td>
                            <td class="text-center"><?= $films->ANNEE_FILM ?></td>
                            <td class="text-center"><?= $films->NOM_STAR ?></td>
                            <td class="text-center"><?= $films->PRENOM_STAR ?></td>
                            <td class="text-center">
                                <a href="VCIResa3.php?ID_FILM=<?= $films->ID_FILM ?>">
                                    <img src="src/pictures/FilmMiniatures/<?= $films->LIB_TYPE_FILM . '/' . $films->REF_IMAGE ?>" alt="Affiche du film <?= $films->TITRE_FILM ?>">
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include("pied.php");
?>