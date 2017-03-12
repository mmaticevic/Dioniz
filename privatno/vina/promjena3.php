<?php
include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
	
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
	
	$izraz=$veza->prepare("select * from vino where id=:id");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
	
}

if(isset($_POST["promjeni"])){
	
		
	include_once 'kontrolaunos.php';
	
	if(count($poruka)==0){
		

		
		//radi insert
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare("UPDATE  vino
		set 
		sorta_vina=:sorta_vina,
		vinarija=:vinarija,
		boja_vina=:boja_vina,
		kvaliteta_vina=:kvaliteta_vina,
		zapremnina=:zapremnina,
		postotak_alkohola=:postotak_alkohola,
		godina_berbe=:godina_berbe,
		opis=:opis,
		stanje_skladista=:stanje_skladista,
		slika=:slika,
		cijena=:cijena
		where id=:id");

		$izraz->bindParam("id",$_POST["id"]);
		$izraz->bindParam("sorta_vina",$_POST["sorta_vina"]);
		$izraz->bindParam("vinarija",$_POST["vinarija"]);
		$izraz->bindParam("boja_vina",$_POST["boja_vina"]);
		$izraz->bindParam("kvaliteta_vina",$_POST["kvaliteta_vina"]);
		$izraz->bindParam("zapremnina",$_POST["zapremnina"]);
		$izraz->bindParam("postotak_alkohola",$_POST["postotak_alkohola"]);
		$izraz->bindParam("godina_berbe",$_POST["godina_berbe"]);
		$izraz->bindParam("opis",$_POST["opis"]);
		$izraz->bindParam("stanje_skladista",$_POST["stanje_skladista"]);
		$izraz->bindParam("slika",$_POST["slika"]);
		$izraz->bindParam("cijena",$_POST["cijena"]);
	
		
		
		$izraz->execute();
		header("location: index.php");
	}
}

//$poruke["naziv"]="Naziv obavezno";

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

							<input type="text" name="id" value="<?php echo $_POST["id"] ?>">
						

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