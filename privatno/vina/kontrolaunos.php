<?php  

$_POST["sorta_vina"]=trim($_POST["sorta_vina"]);
if(strlen($_POST["sorta_vina"])==0){
	$poruka["sorta_vina"]="Sorta vina obavezna";
}

 if($_POST["vinarija"]==0){
	$poruka["vinarija"]="Obavezna vinarija";
}

if($_POST["boja_vina"]==0){
	$poruka["boja_vina"]="Obavezan unos";
}



if(strlen($_POST["godina_berbe"])==0){
	$poruka["godina_berbe"]="Obavezna godina berbe";
}

$_POST["zapremnina"]=trim($_POST["zapremnina"]);
if(strlen($_POST["zapremnina"])==0){
	$poruka["zapremnina"]="Obavezan unos";
}

$_POST["postotak_alkohola"]=trim($_POST["postotak_alkohola"]);
if(strlen($_POST["postotak_alkohola"])==0){
	$poruka["postotak_alkohola"]="Obavezan unos";
}


$_POST["kvaliteta_vina"]=trim($_POST["kvaliteta_vina"]);
if(strlen($_POST["kvaliteta_vina"])==0){
	$poruka["kvaliteta_vina"]="Unesite kvalitetu vina";
}

$_POST["stanje_skladista"]=trim($_POST["stanje_skladista"]);
if(strlen($_POST["stanje_skladista"])==0){
	$poruka["stanje_skladista"]="Obavezan unos kolićine vina";
}

$_POST["cijena"]=trim($_POST["cijena"]);
if(strlen($_POST["cijena"])==0){
	$poruka["cijena"]="Cijena obavezna";
}


