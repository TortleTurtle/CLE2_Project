<?php
//session start
session_start();
//De connectie tot de database
include_once '../includes/php/connect.php';

//variabelen declareren.
$fout = "";

//Deze if controleerd of er al ingelogd is.
if ( isset($_SESSION['gebruikersnaam']) ) {
    header('location: adminpagina.php');
    //exit het script om te voorkomen dat de rest van de pagina getoond wordt.
    exit();
}

if ( isset($_POST['submit']) ) {
    $gebruikersnaam = mysqli_real_escape_string( $db, $_POST['naam'] );
    $wachtwoord = mysqli_real_escape_string( $db, $_POST['wachtwoord'] );

    $querry = "SELECT * FROM beheerders WHERE naam = '$gebruikersnaam'";
    $result = mysqli_query( $db, $querry );

    $inloggegevens = mysqli_fetch_assoc( $result );

    echo 'submit is ingedrukt';

    if ( $gebruikersnaam == $inloggegevens['naam'] && $wachtwoord == $inloggegevens['wachtwoord'] ){
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        echo 'succes!';
    }
    else {
        $fout = 'De ingevoerde combinatie is niet gevonden.';
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<header>
    <h3>Login Pagina</h3>
</header>
<div class="main">
    <div class="form" id="login">
    <div class="container">
        <p class="error"><?= $fout; ?></p>
        <form target="login.php" method="post">
            <label for="naam">Gebruikersnaam</label>
            <div class="formrow"><input type="text" name="naam" id="naam" placeholder="Vul je gebruikersnaam in:"></div><br>
            <label for="wachtwoord">Wachtwoord</label>
            <div class="formrow"><input type="text" name="wachtwoord" id="wachtwoord" placeholder="Vul je wachtwoord in:"></div><br>
            <input type="submit" name="submit" id="submit" placeholder="log in!">
        </form>
    </div>
    </div>
</div>
</body>
</html>