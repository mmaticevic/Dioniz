<?php  
if(trim($_POST["naselje"])==""){
	$poruka="Obavezno ime naselja";
	return;
}
if(trim($_POST["postanskibroj"])==""){
	$poruka="Obavezno ime postanskog broja";
	return;
}
if(trim($_POST["opcina"])==""){
	$poruka="Obavezno ime općine";
	return;
}
if(trim($_POST["zupanija"])==""){
	$poruka="Obavezno ime županije";
	return;
}
