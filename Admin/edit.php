<?php

session_start() ;

include_once "../includes/php/main.php";

checkLogin() ;

//De juiste reservering ophalen uit de database met behulp van de primary key
$res_id = $_GET[ 'res_id' ] ;

$querry = "SELECT * FROM reserveringen WHERE res_id='$res_id'" ;
$result = mysqli_query( $db, $querry ) ;

$reservering = mysqli_fetch_assoc( $result ) ;


if (isset($_POST['submit'])) {
    //Eerst validation om injecties tegen te gaan.
    $voornaam = mysqli_real_escape_string($db,$_POST['voornaam']);
    $achternaam = mysqli_real_escape_string($db, $_POST["achternaam"]);
    $telnummer = $_POST["tel"];
    $email = mysqli_real_escape_string($db, $_POST["email"]);

    //Dit is voor de keuze tafelen of afhalen.
    $keuze = $_POST["keuze"];

    $personen = $_POST["pers"];
    $maaltijd_1 = $_POST["maaltijd_1"];
    $maaltijd_2 = $_POST["maaltijd_2"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];

    updateBooking( $res_id, $voornaam, $achternaam, $telnummer, $email, $keuze, $datum, $tijd, $personen, $maaltijd_1, $maaltijd_2, $db ) ;
}

mysqli_close( $db ) ;

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Reservering aanpassen</title>
</head>
<body>
<div class="container" id="formcontainer">
    <form action="" method="post" name="reservering" id="reservering">
        <div class="container" id="contactcontainer">
            <h2>Contactgegevens</h2>
            <label for="voornaam">Voornaam*:</label><br>
            <div class="form-row">
                <input type="text" name="voornaam" id="voornaam" placeholder="Bij" value="<?= $reservering[ 'voornaam' ] ; ?>"><br>
            </div>
            <label for="achternaam">Achternaam*:</label><br>
            <div class="form-row">
                <input type="text" name="achternaam" id="achternaam" placeholder="Elles" value="<?= $reservering[ 'achternaam' ] ; ?>"><br>
            </div>
            <label for="tel">Telefoon*:</label><br>
            <div class="form-row">
                <input type="tel" name="tel" id="tel" placeholder="0187663344" value="<?= $reservering[ 'tel_num' ] ; ?>"><br>
            </div>
            <label for="email">E-mail*:</label><br>
            <div class="form-row">
                <input type="email" name="email" id="email" placeholder="info@bijelles.nl" value="<?= $reservering[ 'email' ] ; ?>">
            </div>
        </div>
        <div class="container" id="detailscontainer">
            <h2>Details</h2>
            <label for="keuze">Tafelen of afhalen?*</label><br>
            <select name="keuze" id="keuze" form="reservering">
                <option value="tafel">Tafelen</option>
                <option value="afhalen">Afhalen</option>
            </select>
            <div class="container" id="tafel">
                <label for="pers">Aantal personen:</label><br>
                <div class="form-row">
                    <input type="number" name="pers" id="pers" value="<?= $reservering[ 'aantal_pers' ] ; ?>">
                </div>
            </div>
            <div class="container" id="afhalen">
                <label for="maaltijd_1">Maaltijd 1:</label><br>
                <div class="form-row">
                    <input type="number" name="maaltijd_1" id="maaltijd_1" placeholder="Hoeveel porties?" value="<?= $reservering[ 'maaltijd_1' ] ; ?>">
                </div>
                <label for="maaltijd 2">Maaltijd 2:</label><br>
                <div class="form-row">
                    <input type="number" name="maaltijd_2" id="maaltijd_2" placeholder="Hoeveel porties?" value="<?= $reservering[ 'maaltijd_2' ] ; ?>">
                </div>
            </div>
            <div class="container" id="datumtijd">
                <label for="datum">Datum*</label><br>
                <div class="form-row">
                    <input type="date" name="datum" id="datum" value="<?= $reservering[ 'datum' ] ; ?>">
                </div>
                <label for="tijd">Tijd*</label><br>
                <div class="form-row">
                    <input type="time" name="tijd" id="tijd" value="<?= $reservering[ 'tijd' ] ; ?>">
                </div>
            </div>
            <button type="submit" name="submit" class="button" form="reservering">Verzend</button>
        </div>
    </form>
</div>
</body>
</html>