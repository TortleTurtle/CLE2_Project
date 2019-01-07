<?php
//connectie tot de database.
include_once '../includes/php/connect.php';

//start de sessie
session_start();

//controleer of er wel ingelogd is.
if ( !( isset ( $_SESSION['gebruikersnaam']) ) ) {
    //doorsturen naar de inlog pagina.
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

//Als de pagina laad laat hij alles van de huidige dag zien.
$date = date('y-m-d');

$querry = "SELECT * FROM reserveringen";
$result = mysqli_query( $db, $querry );

$reserveringen = [];
while ( $row = mysqli_fetch_assoc( $result ) ) {
    $reserveringen[] = $row ;
}

print_r($reserveringen);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
<header>
    <h3>Agenda</h3>
</header>
<div class="main">
    <div class="row">
        <div class="container">
            <h4>Filters</h4><br>
            <form action="agenda.php" method="get" name="filter" id="filter">
                <label for="datum">Datum</label>
                    <input type="date" name="datum" id="datum">
                <div class="container" id="extrafilters">
                    <label for="type">Tafel of Afhaal</label>
                    <select name="type" id="type" form="filter">
                        <option>Tafel</option>
                        <option>Afhaal</option>
                    </select>
                </div>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="container" id="tabel">
            <table>
                <tr>
                    <th>Reserveringsnummer</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Telefoonnummer</th>
                    <th>Type bestelling</th>
                    <th>Aantal personen</th>
                    <th>Aantal maaltijd 1</th>
                    <th>Aantal maaltijd 2</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                </tr>
                <?php foreach ( $reserveringen as $reservering) { ?>
                    <tr>
                        <td><?= $reservering[ 'res_id' ] ; ?></td>
                        <td><?= $reservering[ 'voornaam' ] ; ?></td>
                        <td><?= $reservering[ 'achternaam' ] ; ?></td>
                        <td><?= $reservering[ 'tel_num' ] ; ?></td>
                        <td><?= $reservering[ 'order_type' ] ; ?></td>
                        <td><?= $reservering[ 'aantal_pers' ] ; ?></td>
                        <td><?= $reservering[ 'maaltijd_1' ] ; ?></td>
                        <td><?= $reservering[ 'maaltijd_2' ] ; ?></td>
                        <td><?= $reservering[ 'datum' ] ; ?></td>
                        <td><?= $reservering[ 'tijd' ] ; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="row">

    </div>
</div>
</body>
</html>