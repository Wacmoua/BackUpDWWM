<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Video Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/VCI.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once("VCITitre.php");
        titreSite();
        ?>
        <div class="row">
            <?PHP
            include("VCIMenu.html");
            ?>
            <div class="col-12 col-md-10">
                <div id="tete">
                    <h4 class="text-center">BIENVENUE SUR LE SITE DU VIDEO CLUB !</h4>
                </div>
                <div id="corps" class="text-center">
                    <img src="src/pictures/DesignVideoClub/Rideau.png" alt="Rideau cinéma" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="src/js/VCI.js"></script>
</body>

</html>