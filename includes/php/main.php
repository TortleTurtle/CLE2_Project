<?php
// connection to the database.
$host       = "localhost";
$database   = "reserveringen";
$user       = "root";
$password   = "";
$db = mysqli_connect($host, $user, $password, $database) or die( "Error: " . mysqli_connect_error() );

//veel gebruikte functies:

//controleer of de user ingelogd is.
function checkLogin() {
    if ( ! ( isset ( $_SESSION[ 'gebruikersnaam' ] ) ) ) {
        header('location: login.php' ) ;
        //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
        exit() ;
    }
}

//functie om de reservering in de database te zetten.
function insertBooking() {
    //eerst controleren of alle velden juist zijn ingevuld.
    if (empty($voornaam) || empty($achternaam) || empty($telnummer) || empty($email) || empty($keuze) || empty($email) || empty($datum) || empty($tijd)) {
        echo "Vul alsjeblieft alle velden in.";
    }
    elseif (!(is_numeric($telnummer)) || !(is_numeric($personen)) || !(is_numeric($maaltijd_1)) || !(is_numeric($maaltijd_2))) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    }
    //Zo ja insert de variabelen in de database.
    else {
        $querry = "INSERT INTO reserveringen (voornaam, achternaam, tel_num, email, order_type, aantal_pers, maaltijd_1, maaltijd_2, datum, tijd )
    VALUES ('$voornaam', '$achternaam', '$telnummer', '$email', '$keuze', '$personen', '$maaltijd_1', '$maaltijd_2', '$datum', '$tijd' )";
        mysqli_query($db, $querry);
        echo "<script type='text/javascript'>alert('De reservering is succesvol geplaatst');</script>";
    }
}

//functie om een rij te updaten.
function updateBooking() {
    //controleer of alle velden juist zijn ingevuld.
    if (empty($voornaam) || empty($achternaam) || empty($telnummer) || empty($email) || empty($keuze) || empty($datum) || empty($tijd)) {
        echo "Vul alsjeblieft alle velden met een * in.";
    } elseif (!(is_numeric($telnummer)) || !(is_numeric($personen)) || !(is_numeric($maaltijd_1)) || !(is_numeric($maaltijd_2))) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    } else {
        //zo ja update de rij in de database.
        $querry = "UPDATE reserveringen
                   SET voornaam = '$voornaam', achternaam = '$achternaam', tel_num='$telnummer', email = '$email', order_type = '$keuze', aantal_pers = '$personen', maaltijd_1 = '$maaltijd_1', maaltijd_2 = '$maaltijd_2', datum = '$datum', tijd = '$tijd'
                   WHERE res_id = '$res_id'";
        mysqli_query( $db, $querry );
        echo "<script type='text/javascript'>alert('De reservering is aangepast!');</script>";
    }
}
?>