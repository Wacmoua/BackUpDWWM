<?php
// PARTIE TRAITEMENT PHP 

require_once "config/config.php";
require_once "config/database.php";

$loginAdmin = "";
$passAdmin = "";

if (isset($_POST["Nom_Admin"]) || ($_POST["Nom_Admin"] != "")) {
    $loginAdmin = trim($_POST["Nom_Admin"]);
    $loginAdmin = htmlentities($loginAdmin);
}
if (isset($_POST["Pass_Admin"]) || ($_POST["Pass_Admin"] != "")) {
    $passAdmin = htmlentities(trim($_POST["Pass_Admin"]));
}

// connection à la base
$db = connectDb();
// ecriture de la requete
// SELECT * FROM admin WHERE LOGIN_ADMIN = ? AND PASS_ADMIN = ? 
$sqlRequest = 'SELECT * FROM admin WHERE LOGIN_ADMIN = ? AND PASS_ADMIN = ?';

// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);

// mettre les parametres
$sqlResponse->bindParam(1, $loginAdmin);
$sqlResponse->bindParam(2, $passAdmin);
$sqlResponse->execute();

// recupération des informations au format objet le 5 en parametre remplace le PDO::FETCH_OBJ
$results = $sqlResponse->rowCount();

//deconnexiond de la base
$db = disconnectDb();

if ($results == 1) {
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
                    <h4 class="text-center">BIENVENUE SUR LA PARTIE ADMIN DU SITE !</h4>
                </div>
                <div id="corps" class="text-center">

                </div>
            </div>
        </div>
    </div>
<?php
    include("pied.php");
} else {
    header('Location: VCIAccueil.php');
}

?>