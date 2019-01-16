<?php

session_start();

if ( !(isset ($_SESSION[ 'gebruikersnaam'] ) ) ) {
    //doorsturen naar de inlog pagina.
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

include_once "../includes/php/connect.php" ;

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

    // controle of alle velden wel ingevuld zijn.
    if (empty($voornaam) || empty($achternaam) || empty($telnummer) || empty($email) || empty($keuze) || empty($datum) || empty($tijd)) {
        echo "Vul alsjeblieft alle velden met een * in.";
    } elseif (!(is_numeric($telnummer)) || !(is_numeric($personen)) || !(is_numeric($maaltijd_1)) || !(is_numeric($maaltijd_2))) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    } else {
        //update querry want de reservering moet aangepast worden.
        $querry = "UPDATE reserveringen
                   SET voornaam = '$voornaam', achternaam = '$achternaam', tel_num='$telnummer', email = '$email', order_type = '$keuze', aantal_pers = '$personen', maaltijd_1 = '$maaltijd_1', maaltijd_2 = '$maaltijd_2', datum = '$datum', tijd = '$tijd'
                   WHERE res_id = '$res_id'";
        mysqli_query( $db, $querry );
        echo "<script type='text/javascript'>alert('De reservering is succesvol geplaatst!');</script>";
    }
}

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
    <form action="" method="post">
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
            <div class="container" id="submit">
                <input type="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</div>
</body>
</html>