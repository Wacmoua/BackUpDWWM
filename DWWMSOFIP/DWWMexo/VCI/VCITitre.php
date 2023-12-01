<?php

function titreSite()
{
    $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE); // precise le format de la date fr_FR pour avoir les termes en francais.
    $fmt->setPattern('dd MMMM YYYY'); // pattern dd pour les jour de 01 à 31 MMMM pour avoir le mois ecrit complet de janvier à decembre et YYYY pour l'année sur 4 chiffres
    $fmt->format(new DateTime());

    $today = $fmt->format(new DateTime());
?>
    <div class="row">
        <div class="col-2">
            <img src="src/pictures/DesignVideoClub/Popcorn-Picks.jpg" alt="logo Video Club" class="img-fluid w-100">
        </div>
        <div class="col-10 col-lg-7 col-xl-8 align-self-center">
            <h1 class="text-center">VIDEO CLUB</h1>
            <h2 class="text-center">... et si on se faisait une petite toile</h2>
        </div>
        <div class="col-12 col-lg-3 col-xl-2">

            <p><?= $today ?></p>

            <div id="Admin">
                <span>Admin</span>
            </div>
            <div id="sous-Admin" class="d-none">
                <form method="post" action="VCIAdmin.php">
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Login :</label>
                        <input type="text" class="form-control col" id="inputLogin" name="Nom_Admin">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="inputPassword" name="Pass_Admin">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Entrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>