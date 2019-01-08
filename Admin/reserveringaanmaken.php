<?php
session_start();

//controle of er wel ingelogd is.
if (!(isset($_SESSION['gebruikersnaam']))) {
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

include_once "../includes/php/connect.php";

if (isset($_POST['submit'])) {
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


    if (empty($voornaam) || empty($achternaam) || empty($telnummer) || empty($email) || empty($keuze) || empty($email) || empty($datum) || empty($tijd)) {
        echo "Vul alsjeblieft alle velden met een * in.";
    } elseif (!(is_numeric($telnummer)) || !(is_numeric($personen)) || !(is_numeric($maaltijd_1)) || !(is_numeric($maaltijd_2))) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    } else {
        $querry = "INSERT INTO reserveringen (voornaam, achternaam, tel_num, email, order_type, aantal_pers, maaltijd_1, maaltijd_2, datum, tijd)
    VALUES ( $voornaam, $achternaam, $telnummer, $email, $keuze, $personen, $maaltijd_1, $maaltijd_2, $timestamp, $tijd )";
        mysqli_query( $db, $querry );
        echo "<script type='text/javascript'>alert('De reservering is succesvol geplaatst!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Reservering aanmaken</title>
</head>
<body>
<header>
    <h3>Reservering aanmaken</h3>
</header>
<div class="container" id="formcontainer">
    <form action="reserveringaanmaken.php" method="post">
        <div class="container" id="contactcontainer">
            <h2>Contactgegevens</h2>
            <label for="voornaam">Voornaam*:</label><br>
            <div class="form-row">
                <input type="text" name="voornaam" id="voornaam" placeholder="Bij" value="<?php if(isset($voornaam)){echo "$voornaam";} else {echo "";}?>"><br>
            </div>
            <label for="achternaam">Achternaam*:</label><br>
            <div class="form-row">
                <input type="text" name="achternaam" id="achternaam" placeholder="Elles" value="<?php if(isset($achternaam)){echo "$achternaam";} else {echo "";}?>"><br>
            </div>
            <label for="tel">Telefoon*:</label><br>
            <div class="form-row">
                <input type="tel" name="telefoon" id="tel" placeholder="0187663344" value="<?php if(isset($telnummer)){echo "$telnummer";} else {echo "";}?>"><br>
            </div>
            <label for="email">E-mail*:</label><br>
            <div class="form-row">
                <input type="email" name="email" id="email" placeholder="info@bijelles.nl" value="<?php if(isset($telnummer)){echo "$telnummer";} else {echo "";}?>">
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
                    <input type="number" name="pers" id="pers" value="<?php if(isset($personen)){echo "$personen";} else {echo "";} ?>">
                </div>
            </div>
            <div class="container" id="afhalen">
                <label for="maaltijd_1">Maaltijd 1:</label><br>
                <div class="form-row">
                    <input type="number" name="maaltijd_1" id="maaltijd_1" placeholder="Hoeveel porties?" value="<?php if(isset($maaltijd_1)){echo "$maaltijd_1";} else {echo "";} ?>">
                </div>
                <label for="maaltijd 2">Maaltijd 2:</label><br>
                <div class="form-row">
                    <input type="number" name="maaltijd_2" id="maaltijd_2" placeholder="Hoeveel porties?" value="<?php if ( isset ( $maaltijd_2 ) ) {echo "$maaltijd_2";} else {echo "";} ?>">
                </div>
            </div>
            <div class="container" id="datumtijd">
                <label for="datum">Datum*</label><br>
                <div class="form-row">
                    <input type="date" name="datum" id="datum" value="<?php if ( isset ( $datum ) ) { echo "$datum"; } else { echo ""; } ?>">
                </div>
                <label for="tijd">Tijd*</label><br>
                <div class="form-row">
                    <input type="time" name="tijd" id="tijd" value="<? if ( isset ( $tijd ) ) { echo "$tijd"; } else { echo ""; } ?>">
                </div>
            </div>
            <div class="button" id="submit">
                <input type="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>

</body>
</html>