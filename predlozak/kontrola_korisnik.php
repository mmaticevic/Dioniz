<?php  

include_once 'function/oib.php';

	$_POST["oib"]=trim($_POST["oib"]);
	if(strlen($_POST["oib"])==0){
		$poruka["oib"]="OIB obavezno";
	}
	
	if(!$dev && !provjeriOIB($_POST["oib"])){
		$poruka["oib"]="OIB neispravan";
	}
	
	if($nacin=="insert"){
	$izraz=$veza->prepare("SELECT count(id) from osoba where oib=:oib");	
		$izraz->execute(array(
			"oib"=>$_POST["oib"]));
	}else{
		$izraz=$veza->prepare("SELECT count(id) from osoba where oib=:oib and id<>:id");
		$izraz->execute(array(
			"oib"=>$_POST["oib"],
			"id"=>$_POST["id"]));
	}
	
	
	$ukupno = $izraz->fetchColumn();
	
	if($ukupno>0){
		$poruka["oib"]="OIB je već dodjeljen drugom korisniku";
	}
	
	
	
	

$_POST["ime"]=trim($_POST["ime"]);
if(strlen($_POST["ime"])==0){
	$poruka["ime"]="Ime  je obavezno!";
	
}
if(strlen($_POST["ime"])>15){
		$poruka["ime"]="Dužina imena mora biti manja od 15 znakova!";
		
		
	}

$_POST["prezime"]=trim($_POST["prezime"]);
if(strlen($_POST["prezime"])==0){
	$poruka["prezime"]="Prezime je obavezno!";
	
}
if(strlen($_POST["prezime"])>18){
		$poruka["prezime"]="Dužina prezimena mora biti manja od 18 znakova!";
		
		
	}

$_POST["adresa"]=trim($_POST["adresa"]);
if(strlen($_POST["adresa"])==0){
	$poruka["adresa"]="Adresa  je obavezna! ";
	
}


 if($_POST["mjesto"]==0){
	$poruka["mjesto"]="Mjesto obavezno!";
	
}


$_POST["email"]=trim($_POST["email"]);
if(strlen($_POST["email"])==0){
	$poruka["email"]="Email je obavezan! ";
	
}
$izraz=$veza->prepare("SELECT * FROM osoba where email=:email");
	$email=$_POST['email'];
	$izraz->bindParam(":email",$email);
	$izraz->execute();
	$osoba=$izraz->fetch(PDO::FETCH_OBJ);
	if($osoba!=null)
	{
		$poruka["email"]="E-mail je zauzet, molimo vas  odaberite drugi!";
	
	}

$_POST["korisnicko_ime"]=trim($_POST["email"]);
if(strlen($_POST["email"])==0){
	$poruka["email"]="Email je obavezan! ";
	
}
$izraz=$veza->prepare("SELECT * FROM operater where korisnicko_ime=:korisnicko_ime");
	$korisnicko_ime=$_POST['korisnicko_ime'];
	$izraz->bindParam(":korisnicko_ime",$korisnicko_ime);
	$izraz->execute();
	$operater=$izraz->fetch(PDO::FETCH_OBJ);
	if($operater!=null)
	{
		$poruka["korisnicko_ime"]="Korisnicko ime je zauzeto, molimo vas  odaberite drugo!";
		
	}	

$_POST["lozinka"]=trim($_POST["lozinka"]);
if(strlen($_POST["lozinka"])==0){
	$poruka["lozinka"]="Lozina je obavezna";
	
}
$_POST["lozinkaponovo"]=trim($_POST["lozinkaponovo"]);
if(strlen($_POST["lozinkaponovo"])==0){
	$poruka["lozinkaponovo"]="Ponovljena lozinka je obavezna";
	
}

if(trim($_POST["lozinkaponovo"])!=trim($_POST["lozinka"])){
	$poruka["lozinkaponovo"]="Lozinke ne odgovaraju";
	
}


