<?php
//start de sessie om de sessievariablen op te kunnen halen.
session_start();

if (!(isset($_SESSION['gebruikersnaam']))) {
    header('location: login.php');
    //stop het script zodat er verder niks uitgevoerd wordt op deze pagina.
    exit();
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
            <!--<a href="link.html">-->
                <div class="container">
                    <h5>Agenda</h5>
                    <p>Klik hier om de agenda te zien.</p>
                </div>
            <!--</a>-->
        </div>
    </div>
</div>

</body>
</html>