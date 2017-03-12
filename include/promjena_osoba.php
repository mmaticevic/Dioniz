<?php

include_once 'config.php';

$izraz = $veza -> prepare("update osoba set oib=:oib,ime=:ime,prezime=:prezime,adresa=:adresa,mjesto=:mjesto,telefon=:telefon,mobitel=:mobitel,email=:email,slika=null where id=:id");
$izraz -> bindParam(':id', $_POST['id'], PDO::PARAM_STR);
$izraz -> bindParam(':oib', $_POST['oib'], PDO::PARAM_STR);
$izraz -> bindParam(':ime', $_POST['ime'], PDO::PARAM_STR);
$izraz -> bindParam(':prezime', $_POST['prezime'], PDO::PARAM_STR);
$izraz -> bindParam(':adresa', $_POST['adresa'], PDO::PARAM_STR);
$izraz -> bindParam(':mjesto', $_POST['mjesto'], PDO::PARAM_STR);
$izraz -> bindParam(':telefon', $_POST['telefon'], PDO::PARAM_STR);
$izraz -> bindParam(':mobitel', $_POST['mobitel'], PDO::PARAM_STR);
$izraz -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
//$izraz -> bindParam(':slika', $_POST['slika'], PDO::PARAM_STR);
$izraz -> execute();

if ($_SESSION["operater"] -> uloga = "korisnik") {

	$izraz = $veza -> prepare("update kupac set datumpromjene=now() where operater=:id");
	$izraz -> bindParam(':id', $_POST['id'], PDO::PARAM_STR);
	$izraz -> execute();

} 

echo "OK";
