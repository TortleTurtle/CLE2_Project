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
function insertBooking( $vnaam, $anaam, $tel, $email, $keuze, $datum, $tijd, $pers, $maaltijd1, $maaltijd2, $connection ) {
    //eerst controleren of alle velden juist zijn ingevuld.
    if ( empty( $vnaam ) || empty( $anaam ) || empty( $tel ) || empty( $email ) ) {
        echo "Vul de contact gegevens correct in a.u.b." ;
    }
    elseif ( empty( $keuze ) || empty( $datum ) || empty( $tijd ) ) {
        echo "De fout zit in de keuzes" ;
    }
    elseif (!( is_numeric( $tel ) ) || !( is_numeric( $pers ) ) || !( is_numeric( $maaltijd1 ) ) || !( is_numeric( $maaltijd2 ) ) ) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    }
    //Zo ja insert de variabelen in de database.
    else {
        $querry = "INSERT INTO reserveringen (voornaam, achternaam, tel_num, email, order_type, aantal_pers, maaltijd_1, maaltijd_2, datum, tijd )
    VALUES ('$vnaam', '$anaam', '$tel', '$email', '$keuze', '$pers', '$maaltijd1', '$maaltijd2', '$datum', '$tijd' )";
        mysqli_query( $connection, $querry);
        echo "<script type='text/javascript'>alert('De reservering is succesvol geplaatst');</script>";
    }
}

//functie om een rij te updaten.
function updateBooking( $vnaam, $anaam, $tel, $email, $keuze, $datum, $tijd, $pers, $maaltijd1, $maaltijd2, $connection ) {
    //controleer of alle velden juist zijn ingevuld.
    if ( empty( $vnaam ) || empty( $anaam ) || empty( $tel ) || empty( $email ) || empty( $keuze ) || empty( $datum ) || empty( $tijd ) ) {
        echo "Vul alsjeblieft alle velden met een * in.";
    } elseif ( !( is_numeric( $tel ) ) || !( is_numeric( $pers ) ) || !( is_numeric( $maaltijd1 ) ) || !( is_numeric( $maaltijd2 ) ) ) {
        echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in." ;
    } else {
        //zo ja update de rij in de database.
        $querry = "UPDATE reserveringen
                   SET voornaam = '$vnaam', achternaam = '$anaam', tel_num='$tel', email = '$email', order_type = '$keuze', aantal_pers = '$pers', maaltijd_1 = '$maaltijd1', maaltijd_2 = '$maaltijd2', datum = '$datum', tijd = '$tijd'
                   WHERE res_id = '$res_id'";
        mysqli_query( $connection, $querry );
        echo "<script type='text/javascript'> alert( 'De reservering is aangepast!' ) ; </script>" ;
    }
}
?>