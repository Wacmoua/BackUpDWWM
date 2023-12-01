<?php
// PARTIE TRAITEMENT PHP
require_once "config/config.php";
require_once "config/database.php";

// Recupération des info passées en get
$idFilm="";
// Contôle de la valeur du GET si null ou vide renvoie vers la page d'ou provient le submit
if (isset ($_GET["ID_FILM"]) || ($_GET["ID_FILM"] != ""))
{
    $idFilm= $_GET["ID_FILM"];
}
else{
    header('Location: VCIAccueil.php');
}

// connection à la base
$db=connectDb();
// ecriture de la requete
$sqlRequest = 'SELECT * FROM film join star on star.ID_Star=film.ID_REALIS join typefilm on typefilm.CODE_TYPE_FILM=film.CODE_TYPE_FILM where film.ID_FILM =\''.$idFilm.'\'';
// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);
$sqlResponse->execute();
// recupération des informations au format objet
$results = $sqlResponse->fetchAll(5);
//deconnexiond de la base
$db=disconnectDb();
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
        <div class="col-10">
            <div id="tete">
                <h4 class="text-center">SELECTIONNEZ VOTRE FILM !</h4>
            </div>
            <div id="corps">
                <table class="table table-bordered border-primary table-sm align-middle">
                    <tr>
                        <th class="text-center">Affiche</th>
                        <th class="text-center" COLSPAN="3">Informations</th>
                    </tr>
                    <?php
                    foreach ($results as $filmSelected){
                        // transformation du nom de l'image recupéré dans la BDD
                        $explodedName = explode(".", $filmSelected->REF_IMAGE);
                        $imageName = $explodedName[0];
                        $imageName = substr($imageName,0,-4);
                        $imageName.='.jpg';
                    ?>
                    <tr>
                        <td class="text-center" rowspan="3">
                            <img src="src/pictures/FilmAffiches/<?= $filmSelected->LIB_TYPE_FILM.'/'. $imageName ?>" alt="Affiche du film">
                        </td>
                        <td class="text-center" colspan="3"><?= $filmSelected->TITRE_FILM ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"><?= $filmSelected->ANNEE_FILM ?></td>
                        <td class="text-center"><?= $filmSelected->PRENOM_STAR ?></td>
                        <td class="text-center"><?= $filmSelected->NOM_STAR ?></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3"><?= $filmSelected->RESUME ?></td>
                    </tr>

                    <?php
                        $idFilmSelected=$filmSelected->ID_FILM; 
                    }
                    ?>

                </table>
            </div>
            <div id="pied">

                <form method="post" action="VCIResa4.php?ID_FILM=<?=$idFilmSelected ?>">
                    <div class="mb-3">
                        <label for="Nom_Adherent" class="form-label">Nom Adherent :</label>
                        <input type="text" class="form-control col" id="Nom_Adherent" name="Nom_Adherent">
                    </div>
                    <div class="mb-3">
                        <label for="Num_Adherent" class="form-label">Numéro Adherent :</label>
                        <input type="password" class="form-control" id="Num_Adherent" name="Num_Adherent">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Reserver</button>
                    </div>
                    <div class="mb-3">
                        <button id="StopResa" type="button" class="btn btn-danger">Annuler</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include("pied.php");
?>