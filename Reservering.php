<?php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <meta charset="UTF-8">
    <title>Reserveren</title>
</head>

<body>
<header>
    <h3>Bijzonder lekker eten!</h3>
    <div class="navbar">
        <div class="container">
        <img src="http://bijelles.nl/.cm4all/mediadb/logo%20zwart.png" id="logo" alt="BijElles Logo"/>
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Over Ons</a></li>
            <li><a href="#">Lunch</a></li>
            <li><a href="#">Maaltijd</a></li>
            <li><a href="#">Taart en Zoet</a></li>
            <li><a href="#">Catering</a></li>
            <li><a href="#">Borrelen</a></li>
            <li><a href="#">High Tea, Wine & Workshops</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</header>

<div class="main">
    <div class="heading">
        <h1>Reserveren</h1>
        <h4>Wilt u een reservering plaatsen? Dan kunt dat hier doen!</h4>
    </div>
    <div class="container" id="formcontainer">
        <form action="/Reservering.php" id="reservering">
            <div class="container" id="contactcontainer">
                <fieldset id="contact">
                    <legend>Contactgegevens</legend>
                    <label for="voornaam">Voornaam:</label><br>
                    <div class="form-row">
                        <input type="text" name="voornaam" id="voornaam" value="Elles"><br>
                    </div>
                    <label for="achternaam">Achternaam:</label><br>
                    <div class="form-row">
                        <input type="text" name="achternaam" id="achternaam" value="Hagens"><br>
                    </div>
                    <label for="tel">Telefoon:</label><br>
                    <div class="form-row">
                        <input type="tel" name="telefoon" id="tel" value="0187663344"><br>
                    </div>
                    <label for="email">E-mail:</label><br>
                    <div class="form-row">
                        <input type="email" name="email" id="email" value="info@bijelles.nl">
                    </div>
                </fieldset>
            </div>
            <div class="container" id="detailscontainer">
                <fieldset id="details">
                    <legend>Details</legend>
                    <label for="keuze">Tafelen of afhalen?</label><br>
                    <select name="keuze" id="keuze" form="reservering">
                        <option value="tafelen">Tafelen</option>
                        <option value="afhalen">Afhalen</option>
                    </select>
                    <div class="container" id="tafel">
                        <label for="pers">Aantal personen:</label><br>
                        <div class="form-row">
                            <input type="number" name="pers" id="pers" value="0">
                        </div>
                    </div>
                    <div class="container" id="afhalen">
                        <label for="maaltijd 1">Maaltijd 1:</label><br>
                        <div class="form-row">
                            <input type="number" name="maaltijd 1" id="maaltijd 1" value="0">
                        </div>
                        <label for="maaltijd 2">Maaltijd 2:</label><br>
                        <div class="form-row">
                            <input type="number" name="maaltijd 2" id="maaltijd 2" value="0">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="button" id="submit">
                <input type="submit" value="Submit">
            </div>
        </form>
</div>
<div class="footer">

</div>
</body>
</html>