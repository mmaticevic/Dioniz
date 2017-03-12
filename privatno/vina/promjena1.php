

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
		SELECT  a.id as idvina, b.id as idvinarija, c.id as idboje_vina, c.boja, b.naziv, a.sorta_vina, a.zapremnina,a.kvaliteta_vina,a.stanje_skladista, a.postotak_alkohola, a.godina_berbe,a.opis, a.cijena  
		from vino a 
		inner join vinarija b on a.vinarija = b.id
		inner join boja_vina c on a.boja_vina =c.id 
		where a.id=:id");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST["promjeni"])){
	
	include_once 'kontrolaunos.php';

	if(count($poruka)==0){
			//radi insert
		unset($_POST["promjeni"]);
	

			//UPDATE VINARIJA
		

			//Update vina
		$izraz=$veza->prepare("UPDATE vina
			SET 		
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
		$izraz->execute($_POST);


		

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

							<?php 
							poljavino("disabled","sorta_vina","Sorta vina",$poruka);
							poljavino("text","naziv","Vinarija",$poruka);
							poljavino("text","boja","Boja vina",$poruka);
							poljavino("decimal","zapremnina","Zapremnina",$poruka);
							poljavino("decimal","postotak_alkohola","Postotak alkohola",$poruka);
							poljavino("number","godina_berbe","Godina berbe",$poruka);
							poljavino("text","opis","Opis",$poruka);
							poljavino("text","slika","Slika",$poruka);
							poljavino("decimal","cijena","Cijena",$poruka);
							?>	

							
							<button href="index.php" class="btn btn-default" >Odustani</button>
							<button type="submit" name="promjeni" class="btn btn-default" >Spremi</button>
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