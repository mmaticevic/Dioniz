<?php  
$_POST["email"]=trim($_POST["email"]);
if(strlen($_POST["email"])==0){
	$poruka["email"]="Korisnicko ime ili email obavezni";
	return;
}
$izraz=$veza->prepare("SELECT * FROM operater where email=:email");
$email=$_POST['email'];
$izraz->bindParam(":email",$email);
$izraz->execute();
$email=$izraz->fetch(PDO::FETCH_OBJ);
if($email!=null)
{
	$poruka["email"]="Korisničko ime ili email su zauzeti, odaberite drugo";
	return;
}


$_POST["lozinka"]=trim($_POST["lozinka"]);
if(strlen($_POST["lozinka"])==0){
	$poruka["lozinka"]="Lozina je obavezna";
	return;
}
$_POST["lozinkaponovno"]=trim($_POST["lozinkaponovno"]);
if(strlen($_POST["lozinkaponovno"])==0){
	$poruka["lozinkaponovno"]="Ponovljena lozinka je obavezna";
	return;
}

if(trim($_POST["lozinkaponovno"])!=trim($_POST["lozinka"])){
	$poruka["lozinkaponovno"]="Lozinke ne odgovaraju";
	return;
}



$_POST["uloga"]=trim($_POST["uloga"]);
if(strlen($_POST["uloga"])==0){
	$poruka["uloga"]="Uloga obavezna";
	return;
}


