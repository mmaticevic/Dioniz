<?php

	error_reporting( ~E_NOTICE ); 
	
include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
	
}
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['idid'];
		$izraz = $veza->prepare('SELECT sorta_vina, vinarija, boja_vina, zapremnina, kvaliteta_vina, godina_berbe, postotak_alkohola, stanje_skladista, opis, cijena   FROM vino WHERE id =:uid');
		$izraz->execute(array(':uid'=>$id));
		$promjena = $izraz->fetch(PDO::FETCH_ASSOC);
		extract($promjena);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$sorta_vina = $_POST['sorta_vina'];
		$vinarija = $_POST['vinarija'];
		$boja = $_POST['boja_vina'];		
		$zapremnina = $_POST['zapremnina'];
		$kvaliteta_vina = $_POST['kvaliteta_vina'];
		$godina_berbe = $_POST['godina_berbe'];
		$postotak_alkohola = $_POST['postotak_alkohola'];
		$stanje_skladista = $_POST['stanje_skladista'];
		$opis = $_POST['opis'];		
		$cijena = $_POST['cijena'];

		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'img/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$promjena['slika']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $promjena['slika']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE vino 
									     SET
		vinarija=:vinarija,							     
		boja_vina=:boja_vina,
		sorta_vina=:sorta_vina,
		zapremnina=:zapremnina,		
		kvaliteta_vina=:kvaliteta_vina,
		stanje_skladista=:stanje_skladista,
		godina_berbe=:godina_berbe,
		postotak_alkohola=:postotak_alkohola,
		slika=:slika,
		opis=:opis,	
		cijena=:cijena
		WHERE id=:uid');
			$izraz->bindParam(':vinarija',$vinarija);
			$izraz->bindParam(':boja_vina',$boja);
			$izraz->bindParam(':sorta_vina',$sorta_vina);
			$izraz->bindParam(':zapremnina',$zapremnina);
			$izraz->bindParam(':kvaliteta_vina',$kvaliteta_vina);
			$izraz->bindParam(':stanje_skladista',$stanje_skladista);
			$izraz->bindParam(':postotak_alkohola',$postotak_alkohola);						
			$izraz->bindParam(':godina_berbe',$godina_berbe);
			$izraz->bindParam(':slika',$userpic);
			$izraz->bindParam(':opis',$opis);
			$izraz->bindParam(':cijena',$cijena);
			
				
			if($izraz->execute()){
				?>
                <script>
				alert('Uspješno promjenjeno ...');
				window.location.href='index.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Žao nam je promjene nisu izvršene!!!";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- head -->
	<?php include_once '../../head.php'; ?>
	<!-- /head -->
</head>
<body>

<?php include_once '../../header.php'; ?>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">Promjena vina<a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Pogledaj sve unešena vina </a></h1>
    </div>
    

	 <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Vina</label></td>
        <td><input class="form-control" type="text" name="sorta_vina" placeholder="Naziv vina" value="<?php echo $sorta_vina; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Vinarija</label></td>
        <td><select name="vinarija" id="vinarija" placeholder="Vinarija" >
								<option value="0" >Vinarija</option>
								<option>------------------------------------------------</option>

								<?php

								$izraz = $veza -> prepare("SELECT * FROM vinarija order by naziv");
								$izraz -> execute();
								$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
								foreach ($rezultat as $vinarija) : ?>

								<option
								 <?php if(isset($_POST["vinarija"]) && $_POST["vinarija"]==$vinarija->id){
									echo " selected=\"selected\" ";
								} 
								?>  value="<?php echo $vinarija->id; ?>"><?php echo $vinarija->naziv; ?>
									
								</option>

							<?php endforeach; ?>						
												
							

						</select>



       
    </tr>
    
     <tr>
    	<td><label class="control-label">Sorta vina</label></td>
        <td><label >Boja vina:</label>

						<select name="boja_vina" id="boja_vina" placeholder="Sorta vina" >
							<option value="0" >Sorta vina</option>
							<option>------------------------------------------------</option>

							<?php
							$izraz = $veza -> prepare("SELECT * FROM boja_vina order by boja");
							$izraz -> execute();
							$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultat as $boja_vina) : ?>

							<option
							<?php if(isset($_POST["boja_vina"]) && $_POST["boja_vina"]==$boja_vina->id){
								echo " selected=\"selected\" ";
							} ?>

							value="<?php echo $boja_vina->id; ?>"><?php echo $boja_vina->boja; ?>
								
							</option>

						<?php endforeach; ?>						

					</select>
					</td>


       
    </tr>

     <tr>
    	<td><label class="control-label">Zapremnina</label></td>
        <td><input class="form-control" type="text" name="zapremnina" placeholder="Zapremnina" value="<?php echo $zapremnina; ?>" /></td>
    </tr>

     <tr>
    	<td><label class="control-label">Kvaliteta vina</label></td>
        <td><input class="form-control" type="text" name="kvaliteta_vina" placeholder="Kvaliteta vina" value="<?php echo $kvaliteta_vina; ?>" /></td>
    </tr>

     <tr>
    	<td><label class="control-label">Godina berbe</label></td>
        <td><input class="form-control" type="text" name="godina_berbe" placeholder="Godina berbe" value="<?php echo $godina_berbe; ?>" /></td>
    </tr>

     <tr>
    	<td><label class="control-label">Postotak alkohola</label></td>
        <td><input class="form-control" type="text" name="postotak_alkohola" placeholder="Postotak alkohola" value="<?php echo $postotak_alkohola; ?>" /></td>
    </tr>

     <tr>
    	<td><label class="control-label">Stanje skladišta</label></td>
        <td><input class="form-control" type="text" name="stanje_skladista" placeholder="Stanje skladišta" value="<?php echo $stanje_skladista; ?>" /></td>
    </tr>

     <tr>
    	<td><label class="control-label">Opis</label></td>
        <td><input class="form-control" type="text" name="opis" placeholder="Opis" value="<?php echo $opis; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Cijena</label></td>
        <td><input class="form-control" type="text" name="cijena" placeholder="Cijena" value="<?php echo $cijena; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Slika</label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    </tr>

    

    
    </table>
    
</form>




    

</div>



	


<!-- Latest compiled and minified JavaScript -->



</body>
</html>