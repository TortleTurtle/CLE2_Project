<?php
session_start() ;

include_once "../includes/php/main.php";

checkLogin() ;

if ( isset ( $_POST[ 'submit' ] ) ) {
    $voornaam = mysqli_real_escape_string( $db, $_POST[ 'voornaam' ] ) ;
    $achternaam = mysqli_real_escape_string( $db, $_POST[ 'achternaam' ] ) ;
    $telnummer = $_POST[ 'tel' ];
    $email = mysqli_real_escape_string( $db, $_POST[ 'email' ] ) ;

    //Dit is voor de keuze tafelen of afhalen.
    $keuze = $_POST[ 'keuze' ] ;

    $personen = $_POST[ 'pers' ] ;
    $maaltijd_1 = $_POST[ 'maaltijd_1' ] ;
    $maaltijd_2 = $_POST[ 'maaltijd_2' ] ;
    $datum = $_POST[ 'datum' ] ;
    $tijd = $_POST[ 'tijd' ] ;

    insertBooking( $voornaam, $achternaam, $telnummer, $email, $keuze, $datum, $tijd, $personen, $maaltijd_1, $maaltijd_2, $db ) ;
}

    mysqli_close( $db );
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
    <form action="reserveringaanmaken.php" method="post" name="reservering" id="reservering">
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
                <input type="tel" name="tel" id="tel" placeholder="0187663344" value="<?php if(isset($telnummer)){echo "$telnummer";} else {echo "";}?>"><br>
            </div>
            <label for="email">E-mail*:</label><br>
            <div class="form-row">
                <input type="email" name="email" id="email" placeholder="info@bijelles.nl" value="<?php if(isset($email)){echo "$email";} else {echo "";}?>">
            </div>
        </div>
        <div class="container" id="detailscontainer">
            <h2>Details</h2>
            <label for="keuze">Tafelen of afhalen?*</label><br>
            <select name="keuze" id="keuze">
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
                    <input type="time" name="tijd" id="tijd" value="<?php if ( isset ( $tijd ) ) { echo "$tijd"; } else { echo ""; } ?>">
                </div>
            </div>
            <div class="row">
                <button type="submit" name="submit" class="button" form="reservering">Verzend</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>