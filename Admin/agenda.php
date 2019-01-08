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

$reserveringen = [];

if ( isset ( $_POST[ 'submit'] ) ) {
    if ( empty( $_POST[ 'datum' ] ) && empty( $_POST[ 'type' ] ) ) {
        $message = "Geef de filter velden een waarde" ;
        $datum = date( 'Y-m-d' ) ;
        $querry = "SELECT * FROM reserveringen WHERE datum='datum' ORDER BY tijd;" ;
    }
    elseif ( empty( $_POST[ 'datum' ] ) && !( empty( $_POST[ 'type' ] ) ) ) {
        $datum = date( 'Y-m-d') ;
        $type = $_POST[ 'type' ] ;
        $querry = "SELECT * FROM reserveringen WHERE datum='datum' AND order_type='$type' ORDER BY tijd;" ;
    }
    elseif ( !( empty( $_POST[ 'datum' ] ) ) && empty( $_POST[ 'type'] ) ) {
        $datum = $_POST[ 'datum' ] ;
        $querry = "SELECT * FROM reserveringen WHERE datum='datum' ORDER BY tijd;" ;
    }
    else {
        $datum = $_POST[ 'datum' ] ;
        $type = $_POST[ 'type' ] ;
        $querry = "SELECT * FROM reserveringen WHERE datum='datum' AND order_type='$type' ORDER BY tijd;" ;
    }
}
else {
    //Als de pagina wordt de huidige datum gebruikt.
    echo "submit is niet ingedrukt";
    $datum = date('Y-m-d');
    $querry = "SELECT * FROM reserveringen WHERE datum='$datum' ORDER BY tijd;" ;
}

$result = mysqli_query( $db, $querry );
while ( $row = mysqli_fetch_assoc( $result ) ) {
    $reserveringen[] = $row;
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
                        <option value="">n.v.t.</option>
                        <option value="tafel">Tafel</option>
                        <option value="afhaal">Afhaal</option>
                    </select>
                </div>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
    </div>
    <div class="row">
        <h3>De afspraken voor <?= $datum ; ?></h3>
    </div>
    <div class="row">
        <div class="container" id="tabel">
            <table>
                <tr>
                    <th>Naam</th>
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
                        <td><?= $reservering[ 'voornaam' ] . " " . $reservering[ 'achternaam' ] ; ?></td>
                        <td><?= $reservering[ 'tel_num' ] ; ?></td>
                        <td><?= $reservering[ 'order_type' ] ; ?></td>
                        <td><?= $reservering[ 'aantal_pers' ] ; ?></td>
                        <td><?= $reservering[ 'maaltijd_2' ] ; ?></td>
                        <td><?= $reservering[ 'maaltijd_1' ] ; ?></td>
                        <td><?= $reservering[ 'tijd' ] ; ?></td>
                        <td><a href="details.php?res_id=<?= $reservering[ 'res_id' ] ; ?>">Details</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>