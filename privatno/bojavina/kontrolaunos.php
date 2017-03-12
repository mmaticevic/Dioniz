<?php  
	$_POST["boja"]=trim($_POST["boja"]);
	if(strlen($_POST["boja"])==0){
		$poruka["boja"]="Boja vina obavezna";
		return;
	}
	$izraz=$veza->prepare("SELECT * FROM boja_vina where boja=:boja");
	$boja_vina=$_POST['boja'];
	$izraz->bindParam(":boja",$boja);
	$izraz->execute();
	$boja=$izraz->fetch(PDO::FETCH_OBJ);
	if($boja!=null)
	{
		$poruka["boja"]="Boja vina vec postoji!";
		return;
	}




	