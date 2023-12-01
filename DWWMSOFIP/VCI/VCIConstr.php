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
                <h4 class="text-center">SITE EN COURS DE CONSTRUCTION</h4>
            </div>
            <div id="corps" class="text-center">
                <img src="src/pictures/DesignVideoClub/Construction.jpg" alt="Site en construction" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
<?php
header("Refresh: 5 ;url=VCIAccueil.php");

include("pied.php");

?>