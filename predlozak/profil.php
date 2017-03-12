<?php include_once '../config.php'; 
 


if(isset($_GET["id"])){
	if (!is_numeric($_GET["id"])){
		header("location: ../logout.php");
	//print_r(is_numeric($_GET["id"]));
		exit;
	}
	
	$izraz=$veza->prepare("select * from osoba where id=:id");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../head.php'; ?>

</head>
<body>
<!-- header -->
<?php include_once '../header.php'; ?>

<?php

				

?>

<section id="cart_items">
	<div class="container">	
			<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3">
					<div class="shopper-info">
						<p>Korisnički podatci</p>
						<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
						
							
							<input type="password" name="trenutnaLozinka" type="password">
							<input type="password" name="novaLozinka" type="password">
							<input type="password" name="ponovoNovaLozinka" type="password">
						</form>
						
						<a class="btn btn-primary" href="#">Odustani</a>				
						<a class="btn btn-primary" href="#">Promjeni</a>
					</div>
				</div>
				<div class="col-sm-5 ">
					<div class="bill-to">
						<p>Osobni podatci</p>
						<div class="form-one">
							<form id="myform" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" accept-charset="utf-8" >
								<input type="text" name="id" value="<?php echo $_POST["id"] ?>">
								<input type="text" name="oib" value="<?php echo $_POST["oib"] ?>">
						
										                                      
							<a class="btn btn-primary" href="profil.php">Odustani</a>	
							
								<a class="btn btn-primary" href="#">Promjeni</a>					
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="order-message">							
						<?php if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="administrator"){
							?>                                       
							<p>Podsjetnik</p>
							<?php  }
							else if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="korisnik") {
								?>                   
								<p>Moje narudžbe</p>
								<?php } ?>
								<textarea name="message" <?php if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="administrator"){ ?>
									placeholder="Administratorska bilježka"
									<?php  }
									else if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="korisnik") {
										?>                   
										placeholder="Popis narudžbi!!!"
										<?php } ?> ></textarea>	


							
																			
					</div>	
				</div>					
			</div>

		</div>

	</div>

</section> <!--/#cart_items-->
<br>
<?php include_once '../footer.php'; ?>

<?php include_once '../script.php'; ?>
