

<?php include_once '../../config.php';

if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}
include_once 'funkcijaunos.php';

$poruka=array();

if (isset($_POST["dodaj"])) {
	$nacin="insert";
	include_once 'kontrolaunos.php';
	//INSERT VINARIJA
	if(count($poruka)==0){
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare('INSERT INTO vino (vinarija,boja_vina,sorta_vina,zapremnina,kvaliteta_vina,stanje_skladista,postotak_alkohola,godina_berbe,slika,opis,cijena,kreirano) 
			VALUES (:vinarija,:boja_vina,:sorta_vina,:zapremnina,:kvaliteta_vina,:stanje_skladista,:postotak_alkohola,:godina_berbe,:slika,:opis,:cijena,CURRENT_TIMESTAMP)');
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
					<h2 class="title text-center">Dodaj vino</h2>
					<div class="signup-form">
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
							<?php include_once 'atributi.php'; ?>
						

							<a href="index.php" class="btn btn-success ">Odustani</a>
					<button type="submit" name="dodaj" class="btn btn-default" value="Dodaj">Spremi</button>

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