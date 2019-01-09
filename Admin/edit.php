<?php

session_start();

if ( !(isset ($_SESSION[ 'gebruikersnaam'] ) ) ) {
    //doorsturen naar de inlog pagina.
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

$res_id = $_GET[ 'res_id' ] ;

$querry = "SELECT * FROM reserveringen WHERE res_id='$res_id'" ;
$result = mysqli_query( $db, $querry ) ;

$reservering = mysqli_fetch_assoc( $result ) ;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

</body>
</html>