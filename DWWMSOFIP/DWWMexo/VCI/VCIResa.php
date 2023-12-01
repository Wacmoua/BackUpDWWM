<?php
// PARTIE TRAITEMENT PHP 
require_once "config/config.php";
require_once "config/database.php";

// connection à la base
$db = connectDb();
// ecriture de la requete
$sqlRequest = 'SELECT * FROM typefilm';

// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);
$sqlResponse->execute();

// recupération des informations au format objet le 5 en parametre remplace le PDO::FETCH_OBJ
$results = $sqlResponse->fetchAll(PDO::FETCH_OBJ);
//$results = $sqlResponse->fetchAll(5);

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
    <?php
    require_once("VCITitre.php");
    titreSite();
    ?>
    <div class="row">
        <?php
        include("VCIMenu.html");
        ?>
        <div class="col-12 col-md-10">
            <div id="tete">
                <h4 class="text-center">CHOIX D'UNE CATEGORIE DE FILM !</h4>
            </div>
            <div id="corps" class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="VCIResa2.php">
                            <div class="mb-3">
                                <select class="form-select" id="selectCatFilm" name="selectCatFilm">

                                    <?php
                                    // On va ici générer de maniière dynamique le contenu du select html
                                    // On boucle sur les résultats obtenus de la requette sql 
                                    // Je recupère un objet en reponse donc je le parcours avec un foreach
                                    foreach ($results as $catFilm) {
                                        // Pour chaque ligne trouvées les informations sont enregistrées dans $catfilm je créé une ligne html
                                        // Option avec un attribut value ( <option value="le code de la catégorie"> le nom de la catégorie  </option>)
                                        // Pour me simplifier le code je n'utilise pas un echo dans le php c'est pour ca que je ferme la balise php
                                    ?>
                                        <option value="<?= $catFilm->CODE_TYPE_FILM ?>"> <?= $catFilm->LIB_TYPE_FILM ?></option>
                                    <?php
                                        // Je reouvre la balise php pour fermer l'accolade de la fonction foreach
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Selectionner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("pied.php");
?>