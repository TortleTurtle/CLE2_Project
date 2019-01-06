<?php
include_once "connect.php";

$voornaam = mysqli_real_escape_string($_POST["voornaam"]);
$achternaam = mysqli_real_escape_string($_POST["achternaam"]);
$telnummer = $_POST["tel"];
$email = mysqli_real_escape_string($_POST["email"]);
//Dit is voor de keuze tafelen of afhalen.
$keuze = $_POST["keuze"];
$personen = $_POST["pers"];
$maaltijd_1 = $_POST["maaltijd_1"];
$maaltijd_2 = $_POST["maaltijd_2"];
$datum = $_POST["datum"];
$tijd = $_POST["tijd"];

$timestamp = strtotime("2018-12-12 19:00");
echo "$timestamp";

if(empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($passwordconf) || empty($email) || empty($securityq) || empty($qanswer)) {
    echo "Vul alsjeblieft alle velden in.";
    exit();
}
elseif (!(is_numeric($telnummer)) || !(is_numeric($personen)) || !(is_numeric($maaltijd_1)) || !(is_numeric($maaltijd_2))){
    echo "Vul in de velden waar eenn nummer gevraagd wordt een nummer in.";
    exit();
}
else {
    $querry = "INSERT INTO reserveringen (voornaam, achternaam, tel_num, email, order_type, aantal_pers, maaltijd_1, maaltijd_2, datum)
    VALUES ('$voornaam', $achternaam, $telnummer, $email, $keuze, $personen, $maaltijd_1, $maaltijd_2, $timestamp)";
    mysqli_query($db, $querry);
}
?>