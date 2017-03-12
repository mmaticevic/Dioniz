

<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}

$poruka="";

if (isset($_POST["dodaj"])) {

	include_once 'kontrolaunos.php';
	//INSERT VINARIJA
	if(strlen($poruka)==0){
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
						<h2 class="title text-center">Dodaj vinariju</h2>
						
						<div class="signup-form"><!--Reg form-->
						
							<form  method="POST" >
								<label for="usr">Naselje:</label>
								<input type="text" name="naselje" id="naselje" placeholder="Naselje" value="<?php echo isset($_POST["naselje"]) ? $_POST["naselje"] : ""; ?>" />

								<label for="usr">Poštanski broj:</label>
								<input type="number" name="postanskibroj" id="postanskibroj" placeholder="Poštanski broj" value="<?php echo isset($_POST["postanskibroj"]) ? $_POST["postanskibroj"] : ""; ?>" >

								<label for="usr">Općina:</label>
								<input type="text" name="opcina" id="opcina" placeholder="Općina" value="<?php echo isset($_POST["opcina"]) ? $_POST["opcina"] : ""; ?>" >

								

								<label for="usr">Županija:</label>
								<input type="text" name="zupanija" id="zupanija" placeholder="Županija"  value="<?php echo isset($_POST["zupanija"]) ? $_POST["zupanija"] : ""; ?>">

															

							<button type="submit" name="dodaj" class="btn btn-default">Spremi</button>
						</form>
						<?php 
						if(strlen($poruka)>0)
						{
							?>
							<div class="alert alert-success">
							<?php
							echo $poruka;
						 
						}
						?>
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