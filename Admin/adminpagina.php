<?php
//start de sessie om de sessievariablen op te kunnen halen.
session_start();

if ( !(isset( $_SESSION['gebruikersnaam'] ) ) ) {
    //doorsturen naar de inlog pagina.
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
}

//uitloggen.
if ( isset( $_POST['logout'] ) ) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>Adminpagina</title>
</head>
<body>
<header>
    <h3>Adminpagina</h3>
</header>
<div class="main">
    <div class="row">
        <div class="container"  id="maken">
            <a href="reserveringaanmaken.php">
                <div class="container">
                <h5>Reservering maken</h5><br>
                <p>Klik hier om een reservering aan te maken voor een klant.</p>
                </div>
            </a>
        </div>
        <div class="container" id="aanpassen">
            <!--<a href="link.html">-->
                <div class="container">
                    <h5>Reservering aanpassen.</h5>
                    <p>Klik hier om de reservering van een klant aan te passen.</p>
                </div>
            <!--</a>-->
        </div>
        <div class="container" id="agenda">
            <a href="agenda.php">
                <div class="container">
                    <h5>Agenda</h5>
                    <p>Klik hier om de agenda te zien.</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <form action="adminpagina.php" name="logout" id="logout" method="post">
                <input type="submit" name="logout" id="logout" value="logout">
            </form>
        </div>
    </div>
</div>

</body>
</html>