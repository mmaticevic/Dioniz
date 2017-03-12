

<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}
include_once 'funkcijaunos.php';
$poruka=array();

if (isset($_POST["dodaj"])) {

	include_once 'kontrolaunos.php';
	//INSERT VINARIJA
	if(count($poruka)==0){
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare('INSERT INTO mjesto (naselje,postanskibroj,opcina,zupanija) 
			VALUES (:naselje,:postanskibroj,:opcina,:zupanija)');
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
					<h2 class="title text-center">Dodaj mjesto</h2>
					<div class="signup-form">
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
							
							
							<?php 
							poljamjesto("text","naselje","Naselje",$poruka);	
							poljamjesto("number","postanskibroj","Poštanski broj",$poruka);
							poljamjesto("text","opcina","Općina",$poruka);
							poljamjesto("text","zupanija","Županija",$poruka);
							?>
							
							
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