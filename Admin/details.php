<?php

session_start();

//controleer of er wel ingelogd is.
if ( !( isset ( $_SESSION[ 'gebruikersnaam' ] ) ) ) {
    //doorsturen naar de inlog pagina.
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

//connectie met de database
include_once "../includes/php/connect.php";

//res_id komt van de agenda pagina af en wordt gebruikt om de juise reservering binnen te halen.
$res_id = $_GET[ 'res_id' ];

$querry = "SELECT * FROM reserveringen WHERE res_id='$res_id'" ;
$result = mysqli_query( $db, $querry ) ;
$details = mysqli_fetch_assoc( $result ) ;

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <script>
        function sendToEdit() {
            window.location.href = "edit.php?res_id=<?= $res_id ; ?>" ;
        }
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Details Reservering</title>
</head>
<body>
<header>
    <h3>Details Reservering</h3>
</header>
<div class="row">
    <div class="container">
        <ul class="listheader">
            <li>Reserveringsnummer:</li>
            <li>Voornaam:</li>
            <li>Achternaam:</li>
            <li>Telefoon:</li>
            <li>Email:</li>
            <li>Type bestelling:</li>
            <li>Aantal personen:</li>
            <li>Maaltijd 1:</li>
            <li>Maaltijd 2:</li>
            <li>Datum:</li>
            <li>Tijd:</li>
        </ul>
    </div>
    <div class="container">
        <ul class="listcontent">
            <li><?= $details[ 'res_id' ] ; ?></li>
            <li><?= $details[ 'voornaam' ] ; ?></li>
            <li><?= $details[ 'achternaam' ] ; ?></li>
            <li><?= $details[ 'tel_num' ] ; ?></li>
            <li><?= $details[ 'email' ] ; ?></li>
            <li><?= $details[ 'order_type' ] ; ?></li>
            <li><?= $details[ 'aantal_pers' ] ; ?></li>
            <li><?= $details[ 'maaltijd_1' ] ; ?></li>
            <li><?= $details[ 'maaltijd_2' ] ; ?></li>
            <li><?= $details[ 'datum' ] ; ?></li>
            <li><?= $details[ 'tijd' ] ; ?></li>
        </ul>
    </div >
</div>
<div class="row">
    <div class="container">
        <button class="button" onclick="sendToEdit()">Reservering Aanpassen</button>
    </div>
</div>
</body>
</html>