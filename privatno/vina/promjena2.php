

<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
	exit;
}

if(!isset($_GET["id"]) && !isset($_POST["id"])){
	header("location: ../../logout.php");
	exit;
}
include_once 'funkcijaunos.php';
$poruka=array();

if(isset($_GET["id"])){
	if (!is_numeric($_GET["id"])){
		header("location: ../../logout.php");
		//print_r(is_numeric($_GET["id"]));
		exit;
	}


	$izraz=$veza->prepare("
		SELECT  * FROM vino
		where id=:id");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST["promjeni"])){
	$nacin="update";
	include_once 'kontrolaunos.php';

	if(count($poruka)==0){
			//radi insert
		unset($_POST["promjeni"]);
		$veza->beginTransaction();		


			//UPDATE VINARIJA
		$izraz=$veza->prepare("UPDATE vinarija
			set 
			naziv=:naziv		
			where id=:id");
		$izraz->execute(array("id"=>$_POST["id"]));	
							
			
			
			//print_r($_POST);
			//exit;

			//UPDATE BOJA VINA
		$izraz=$veza->prepare("UPDATE boja_vina
								set
								boja=:boja
								
								where id=:id	
							 ");
		$izraz->execute(array(
				
				"id"=>$_POST["id"]
			));


			//Update vina
		$izraz=$veza->prepare("UPDATE vina
			SET 
			vinarija=:vinarija,
			boja_vina=:boja_vina,		
			sorta_vina=:sorta_vina,
			zapremnina=:zapremnina,
			kvaliteta_vina=:kvaliteta_vina,
			stanje_skladista=:stanje_skladista,
			postotak_alkohola=:postotak_alkohola,
			godina_berbe=:godina_berbe,
			slika=:slika,
			opis=:opis,
			cijena=:cijena
			WHERE id=:id
			");


		$izraz->execute(array(			
				"id" => $_POST["id"],
				"vinarija" => $_POST["vinarija"],
				"boja_vina" => $_POST["boja_vina"],					
				"sorta_vina" => $_POST["sorta_vina"],
				"zapremnina" => $_POST["zapremnina"],
				"kvaliteta_vina" => $_POST["kvaliteta_vina"],
				"stanje_skladista" => $_POST["stanje_skladista"],
				"postotak_alkohola" => $_POST["postotak_alkohola"],
				"godina_berbe" => $_POST["godina_berbe"],
				"slika" => $_POST["slika"],
				"opis" => $_POST["opis"],
				"cijena" => $_POST["cijena"]
				)
			);
		$veza->commit();

		header("location: index.php");
	}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- head -->
	<?php include_once '../../head.php'; ?>
	<!-- /head -->
</head>
<!-- header -->
<?php include_once '../../header.php'; ?>
<!-- /header -->
<!-- Admin panel -->

<section>
	<div class="container">
		<div class="row">
			<?php include_once '../admin/adminleft.php'; ?>



			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Promjeni podatke</h2>
					<div class="signup-form">
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">

							<input type="hidden" name="idvina" value="<?php echo $_POST["idvina"] ?>">
							<input type="hidden" name="idvinarija" value="<?php echo $_POST["idvinarija"] ?>">
							<input type="hidden" name="idboje_vina" value="<?php echo $_POST["idboje_vina"] ?>">

							<?php include_once 'atributi.php'; ?>

							
							<a href="index.php" class="btn btn-success ">Odustani</a>
							<button type="submit" name="promjeni" class="btn btn-default" value="Promjeni">Spremi</button>
						</form>




					</div>


				</div>




			</div>
		</div>



	</div>
</div>
</section>
<br>
<!-- /Admin panel -->


<!-- footer -->
<?php include_once '../../footer.php'; ?>
<!-- /footer -->

<!-- script -->
<?php include_once '../../script.php';

?>
<!-- /script -->


<body>

</body>
</html>