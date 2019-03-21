<?php

include_once "includes/php/main.php";

if ( isset ( $_POST[ 'submit' ] ) ) {
    $voornaam = mysqli_real_escape_string( $db, $_POST[ 'voornaam' ] );
    $achternaam = mysqli_real_escape_string( $db, $_POST[ "achternaam" ] );
    $telnummer = $_POST[ "tel" ];
    $email = mysqli_real_escape_string( $db, $_POST[ "email" ] );

    //Dit is voor de keuze tafelen of afhalen.
    $keuze = $_POST[ "keuze" ];

    $personen = $_POST[ "pers" ];
    $maaltijd_1 = $_POST[ "maaltijd_1" ];
    $maaltijd_2 = $_POST[ "maaltijd_2" ];
    $datum = $_POST[ "datum" ];
    $tijd = $_POST[ "tijd" ];

    insertBooking( $voornaam, $achternaam, $telnummer, $email, $keuze, $datum, $tijd, $personen, $maaltijd_1, $maaltijd_2, $db ) ;
}

mysqli_close( $db ) ;

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <meta charset="UTF-8">
    <title>Reserveren</title>
</head>

<body>
<header>
    <h2>Bijzonder lekker eten!</h2>
    <div class="navbar">
        <div id="logocontainer">
        <img src="http://bijelles.nl/.cm4all/mediadb/logo%20zwart.png" id="logo" alt="BijElles Logo"/>
        </div>
        <div id="linkList">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Over Ons</a></li>
                <li><a href="#">Lunch</a></li>
                <li><a href="#">Maaltijd</a></li>
                <li><a href="#">Taart en Zoet</a></li>
                <li><a href="#">Catering</a></li>
                <li><a href="#">Borrelen</a></li>
                <li><a href="#">High Tea, Wine & Workshops</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="main">
    <div class="heading">
        <h1>Reserveren</h1>
        <h4>Wilt u een reservering plaatsen? Dan kunt u dat hier doen!</h4>
    </div>
    <div class="container" id="formcontainer">
        <form action="reservering.php" method="post" name="reservering" id="reservering">
            <div class="container" id="contactcontainer">
                <h2>Contactgegevens</h2>
                <label for="voornaam">Voornaam:</label>
                <div class="form-row">
                    <input type="text" name="voornaam" id="voornaam" placeholder="Bij" value="<?php if(isset($voornaam)){echo "$voornaam";} else {echo "";}?>"><br>
                </div>
                <label for="achternaam">Achternaam:</label>
                <div class="form-row">
                    <input type="text" name="achternaam" id="achternaam" placeholder="Elles" value="<?php if(isset($achternaam)){echo "$achternaam";} else {echo "";}?>"><br>
                </div>
                <label for="tel">Telefoon:</label>
                <div class="form-row">
                    <input type="tel" name="tel" id="tel" placeholder="0187663344" value="<?php if(isset($telnummer)){echo "$telnummer";} else {echo "";}?>"><br>
                </div>
                <label for="email">E-mail:</label>
                <div class="form-row">
                    <input type="email" name="email" id="email" placeholder="info@bijelles.nl" value="<?php if(isset($email)){echo "$email";} else {echo "";}?>">
                </div>
            </div>
            <div class="container" id="detailscontainer">
                <h2>Details</h2>
                <label for="keuze">Tafelen of afhalen?</label>
                <div class="formrow">
                    <select name="keuze" id="keuze">
                        <option value="" disabled selected> Kies een optie </option>
                        <option value="tafel">Tafelen</option>
                        <option value="afhalen">Afhalen</option>
                </select>
                </div>
                <div class="container" id="tafel">
                    <label for="pers">Aantal personen:</label>
                    <div class="form-row">
                        <input type="number" name="pers" id="pers" value="<?php if(isset($personen)){echo "$personen";} else {echo "";} ?>">
                    </div>
                    <label for="maaltijdReserveren">Wil je ook gelijk een maaltijden reserveren?</label>
                    <select name="maaltijdReserveren" id="maaltijdReserveren">
                        <option value="" hidden> -- </option>
                        <option value="true">Ja</option>
                        <option value="false">Nee</option>
                    </select>
                </div>
                <div class="container" id="afhalen">
                    <label for="maaltijd_1">Maaltijd 1:</label>
                    <div class="form-row">
                        <input type="number" name="maaltijd_1" id="maaltijd_1" placeholder="Hoeveel porties?" value="<?php if(isset($maaltijd_1)){echo "$maaltijd_1";} else {echo "";} ?>">
                    </div>
                    <label for="maaltijd 2">Maaltijd 2:</label>
                    <div class="form-row">
                        <input type="number" name="maaltijd_2" id="maaltijd_2" placeholder="Hoeveel porties?" value="<?php if(isset($maaltijd_2)){echo "$maaltijd_2";} else {echo "";} ?>">
                    </div>
                </div>
                <div class="container" id="datumtijd">
                    <label for="datum">Datum</label>
                    <div class="form-row">
                        <input type="date" name="datum" id="datum" value="<?php if(isset($datum)){echo "$datum";} else {echo "";} ?>">
                    </div>
                    <label for="tijd">Tijd</label>
                    <div class="form-row">
                        <input type="time" name="tijd" id="tijd" value="<?php if(isset($tijd)){echo '' . $tijd ;} else { echo '';} ?>">
                    </div>
                </div>
                <div class="row">
                    <button class="button" type="submit" name="submit" id="submit" form="reservering">Verzend</button>
                </div>
            </div>
        </form>
    </div>
    <script src="includes/main.js"></script>
    <footer>

    </footer>
</body>
</html>