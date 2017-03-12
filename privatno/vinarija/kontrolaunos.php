<?php  
include_once '../../function/oib.php';

	$_POST["oib"]=trim($_POST["oib"]);
	if(strlen($_POST["oib"])==0){
		$poruka["oib"]="OIB obavezno";
	}
	
	if(!$dev && !provjeriOIB($_POST["oib"])){
		$poruka["oib"]="OIB neispravan";
	}
	
	if($nacin=="insert"){
	$izraz=$veza->prepare("SELECT count(id) from vinarija where oib=:oib");	
		$izraz->execute(array(
			"oib"=>$_POST["oib"]));
	}else{
		$izraz=$veza->prepare("SELECT count(id) from vinarija where oib=:oib and id<>:id");
		$izraz->execute(array(
			"oib"=>$_POST["oib"],
			"id"=>$_POST["id"]));
	}
	
	
	$ukupno = $izraz->fetchColumn();
	
	if($ukupno>0){
		$poruka["oib"]="OIB je već dodjeljen drugoj vinariji";
	}
	
	



if(strlen($_POST["naziv"])==0){
	$poruka["naziv"]="Naziv  je obavezan!";
}


if(strlen($_POST["adresa"])==0){
	$poruka["adresa"]="Adresa je obavezna!";
}





 if($_POST["mjesto"]==0){
	$poruka["mjesto"]="Mjesto obavezno!";
}


$_POST["ziroracun"]=trim($_POST["ziroracun"]);
if(strlen($_POST["ziroracun"])==0){
	$poruka["ziroracun"]="Žiro-račun je obavezan! ";
}

