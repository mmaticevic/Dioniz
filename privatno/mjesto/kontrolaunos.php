<?php  
	$_POST["naselje"]=trim($_POST["naselje"]);
	if(strlen($_POST["naselje"])==0){
		$poruka["naselje"]="Naselje obavezno";
		return;
	}
	$izraz=$veza->prepare("SELECT * FROM mjesto where naselje=:naselje");
	$naselje=$_POST['naselje'];
	$izraz->bindParam(":naselje",$naselje);
	$izraz->execute();
	$mjesto=$izraz->fetch(PDO::FETCH_OBJ);
	if($mjesto!=null)
	{
		$poruka["naselje"]="Ime naselja je zauzeto, odaberite drugo";
		return;
	}




	if(strlen($_POST["naselje"])>10){
		$poruka["naselje"]="Dužina naselje mora biti manja od 10";
		return;
	}


	$_POST["postanskibroj"]=trim($_POST["postanskibroj"]);
	if(strlen($_POST["postanskibroj"])==0){
		$poruka["postanskibroj"]="Poštanski broj obavezan";
		return;
	}
	if(strlen($_POST["postanskibroj"])>5){
		$poruka["postanskibroj"]="Dužina poštansko broja mora biti 5    
								npr: 31000				";
								return;
	}
	if(strlen($_POST["postanskibroj"])<5){
		$poruka["postanskibroj"]="Dužina poštansko broja mora biti 5    
								npr: 31000				";
								return;
	}


	$_POST["opcina"]=trim($_POST["opcina"]);
	if(strlen($_POST["opcina"])==0){
		$poruka["opcina"]="Opčina obavezna";
	}

	$_POST["zupanija"]=trim($_POST["zupanija"]);
	if(strlen($_POST["zupanija"])==0){
		$poruka["zupanija"]="Županija obavezna";
	}

	