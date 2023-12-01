<?php
// PARTIE TRAITEMENT PHP 
require_once "config/config.php";
require_once "config/database.php";

// Recupération des info passées en get
$idFilm="";
// Contôle de la valeur du get si null ou vide renvoie vers la page d'ou provient le submit
if (isset ($_GET["ID_FILM"]) || ($_GET["ID_FILM"] != ""))
{
    $idFilm= $_GET["ID_FILM"];
}
else{
    header('Location: VCIAccueil.php');
}

// Récuperatiion des identifiant de l'adhérent passé en POST
$nomAdherent="";
$numAdherent="";
if (isset ($_POST["Nom_Adherent"]) || ($_POST["Nom_Adherent"] != ""))
{
    $nomAdherent= trim($_POST["Nom_Adherent"]);
}
if (isset ($_POST["Num_Adherent"]) || ($_POST["Num_Adherent"] != ""))
{
    $numAdherent= trim($_POST["Num_Adherent"]);
}


// connection à la base
$db=connectDb();
// ecriture des requetes
$sqlRequest = 'SELECT * FROM adherent WHERE num_adherent = ? AND nom_adherent = ?';
// Préparation et execution de la requete
$sqlResponse = $db->prepare($sqlRequest);

$sqlResponse -> bindParam(1,$numAdherent);
$sqlResponse -> bindParam(2,$nomAdherent);

$sqlResponse -> execute();

// recupération des informations au format objet
$resultsAdherent = $sqlResponse->rowCount();

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
                <h4 class="text-center">CONFIRMATION DE VOTRE LOCATION!</h4>
            </div>
            <div id="corps">
                <?php
                if ($resultsAdherent == 0){
                    echo ' Vos identifiants ( nom ou pass )sont incorrects !!!';
                }
                else{
                    $db=connectDb();

                    $sqlRequest1 = 'SELECT * FROM location WHERE ID_FILM = ? AND num_adherent = ? AND DATE_RETOUR is NULL';
                    // Préparation et execution de la requete
                    $sqlResponse1 = $db->prepare($sqlRequest1);
                    $sqlResponse1->bindParam(1,$idFilm);
                    $sqlResponse1->bindParam(2,$numAdherent);
                    $sqlResponse1->execute();
                    // recupération des informations au format objet
                    $resultsLocation = $sqlResponse1->rowCount();
                    if ($resultsLocation !=0){
                        echo ' Le film que vous avez selectionné est deja loué par vous même';
                    }
                    else{
                        $date = new DateTime();
                        $dateDebut = $date->format('Y-m-d H:i:s');

                        /*
                                $date2 = new DateTime();
                                $date2->add(new DateInterval('P3D'));
                                $dateRetour = $date2->format('Y-m-d H:i:s');*/

                        $insert='INSERT INTO video.location (NUM_ADHERENT, ID_FILM, DEBUT_LOCATION) VALUES (?,?,?)';
                        $sqlResponse2 = $db->prepare($insert);
                        $sqlResponse2->bindParam(1,$numAdherent);
                        $sqlResponse2->bindParam(2,$idFilm);
                        $sqlResponse2->bindParam(3,$dateDebut);
                        $sqlResponse2 -> execute();
                        
                        
                        $resultatInsertion = $sqlResponse2 -> rowCount();
                        
                        
                        if ( $resultatInsertion != 0){
                            echo 'Votre location est bien enregistrée !';
                        }
                        else{
                            echo ' Un problème est survenu !';
                        }

                    }
                    $db=disconnectDb();  
                }
                ?>
            </div>
            <div id="pied">

            </div>
        </div>
    </div>
</div>
<?php
include("pied.php");
?>
