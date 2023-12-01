<?php
require_once "config/config.php";
require_once "config/database.php";
// connection à la base
$db = connectDb();
// ecriture de la requete pour la liste des types de film
$sqlRequest1 = 'SELECT * FROM typefilm';
// Préparation et execution de la requete
$sqlResponse1 = $db->prepare($sqlRequest1);
$sqlResponse1->execute();
// recupération des informations au format objet
$resultsTypeFilms = $sqlResponse1->fetchAll(5);
// fermeture de la requete
$sqlResponse1->closeCursor();


// ecriture de la requete pour la liste des types de film
$sqlRequest2 = 'SELECT * FROM star';
// Préparation et execution de la requete
$sqlResponse2 = $db->prepare($sqlRequest2);
$sqlResponse2->execute();
// recupération des informations au format objet
$resultsRealisateurs = $sqlResponse2->fetchAll(5);
// fermeture de la requete
$sqlResponse2->closeCursor();

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
        include("VCIMenuAdmin.html");
        ?>
        <div class="col-12 col-md-10">
            <div id="tete">
                <h4 class="text-center">AJOUTER UN FILM</h4>
            </div>
            <div id="corps" class="text-center">
                <form method="post" action="VCINewFilm2.php">
                    <div class="mb-3">
                        <label for="Titre_Film" class="form-label">Titre du film</label>
                        <input type="text" class="form-control" id="Titre_Film" name="Titre_Film">
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="ListeTypeFilm" id="ListeTypeFilm">
                            <option selected value="default">Choississez une catégorie de film</option>
                            <?php
                            foreach ($resultsTypeFilms as $catFilm) {
                                echo "<option value=$catFilm->CODE_TYPE_FILM>$catFilm->LIB_TYPE_FILM</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="ListeRealisateurFilm" id="ListeRealisateurFilm">
                            <option selected value="default">Choississez un réalisateur </option>
                            <?php
                            foreach ($resultsRealisateurs as $Star) {
                                echo "<option value=$Star->ID_STAR>$Star->NOM_STAR $Star->PRENOM_STAR</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Annee_Film" class="form-label">Année de sortie du film</label>
                        <input type="text" class="form-control" id="Annee_Film" name="Annee_Film">
                    </div>

                    <div class="mb-3">
                        <label for="Affiche_Film" class="form-label">Affiche du film</label>
                        <input type="text" class="form-control" id="Affiche_Film" name="Affiche_Film">
                    </div>

                    <div class="mb-3">
                        <label for="Resume_Film" class="form-label">Résumé du film</label>
                        <textarea class="form-control" id="Resume_Film" name="Resume_Film" rows="3"></textarea>
                    </div>

                    <input name="btn_Recommencer" type="Reset" value="Recommencer">
                    <input type="submit" value="Creer">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("pied.php");
?>