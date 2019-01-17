<?php
session_start() ;

include_once '../includes/php/main.php';

checkLogin() ;


//res_id komt van de agenda pagina af en wordt gebruikt om de juise reservering binnen te halen.
$res_id = $_GET[ 'res_id' ];

$querry = "SELECT * FROM reserveringen WHERE res_id='$res_id'" ;
$result = mysqli_query( $db, $querry ) ;
$details = mysqli_fetch_assoc( $result ) ;

if ( isset ( $_POST['submit'] ) ) {
    $delete = "DELETE FROM reserveringen WHERE res_id='$res_id'" ;
    $deletequerry = mysqli_query( $db, $delete) ;
    echo "<script> alert( 'De resrvering is verwijderd.' ) ;</script>";
    header( 'location: agenda.php') ;
    exit();
}

mysqli_close( $db ) ;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <script>
        function sendBack() {
            window.location.href = "agenda.php" ;
        }
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Verwijderen</title>
</head>
<body>
<header>Reservering verwijderen</header>
<div class="main">
    <div class="row">
        <div class="container">
            <p> Weet je zeker dat je deze reservering wilt verwijderen?</p>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <form target="" name="delete" id="delete" method="post">
                <button type="submit" name="submit" form="delete">Ja</button>
            </form>
        </div>
        <div class="container">
            <button type="button" onclick="sendBack()">Nee</button>
        </div>
    </div>
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
</div>
</body>
</html>