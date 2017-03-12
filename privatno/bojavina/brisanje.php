

<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
	exit;
} 

if(!isset($_GET["id"]) && !isset($_POST["id"])){
	header("location: ../../logout.php");
	exit;
}



if(isset($_GET["id"])){
	if (!is_numeric($_GET["id"])){
		header("location: ../../logout.php");
	//print_r(is_numeric($_GET["id"]));
		exit;
	}
	
	$izraz=$veza->prepare("select count(id) from vino where boja_vina=:id");
	$izraz->execute($_GET);
	$ukupno = $izraz->fetchColumn();
}


if(isset($_POST["obrisi"])){
	
	
		unset($_POST["obrisi"]);
		$izraz=$veza->prepare("delete from boja_vina 
		where id=:id");
		$izraz->execute($_POST);
		//print_r($_POST);
		//exit;
		header("location: index.php");
	
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
<body>
<?php include_once '../../header.php'; ?>
<!-- /header -->
<!-- Admin panel -->

<section>
	<div class="container">
		<div class="row">
			<?php include_once '../admin/adminleft.php'; ?>



			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Obriši podatke</h2>
					<div class="signup-form">
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
							
						
							<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>" />

								<?php if($ukupno ==0): ?>

							<button type="submit" name="obrisi" class="btn btn-default" value="Brisanje">Obriši</button>
								<?php else:?>
					E nečeš da brišeš!!!!!!!!!!!!!!
					<?php endif;?>
						<a href="index.php" class="btn btn-success ">Odustani</a>
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