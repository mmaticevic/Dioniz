

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
		unset($_POST["lozinkaponovno"]);
		$izraz=$veza->prepare('INSERT INTO operater (email,lozinka,uloga) 
			VALUES (:email,md5(:lozinka),:uloga)');
		$izraz->execute(array("email"=>$_POST['email'], "lozinka"=>$_POST['lozinka'], "uloga"=>$_POST['uloga'] ));	

		
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
					<h2 class="title text-center">Dodaj operatera</h2>
					<div class="signup-form">
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
							
							
							<?php 
							poljaAdmin("text","email","Email ili korisničko ime",$poruka);	
							poljaAdmin("password","lozinka","Lozinka",$poruka);
							poljaAdmin("password","lozinkaponovno","Lozinka ponovno",$poruka);
							poljaAdmin("text","uloga","Uloga",$poruka);
							
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