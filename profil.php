<?php include_once 'config.php'; 

include_once 'function/ispisosoba.php';
$poruka=array();

if(isset($_GET["id"])){
	if (!is_numeric($_GET["id"])){
		header("location: logout.php");
	//print_r(is_numeric($_GET["id"]));
		exit;
	}
	
	$izraz=$veza->prepare("select * from osoba where id=:id");
	$izraz->execute($_GET);
	$osoba = $izraz->fetch(PDO::FETCH_ASSOC);
	print_r($osoba);
}






?>
<head>
	
	<?php
		include_once 'head.php';
		?>

		
</head>
<body>
<?php include_once 'header.php'; ?>

<section id="cart_items">
	<div class="container">	
			<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-1">
					<div class="shopper-info">
						<p>Korisnički podatci</p>
						<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
							<input type="text" name="id" value="<?php echo $_POST["id"] ?>">
								<?php include_once 'include/atributi_korisnik_promjena.php'; ?>

						<button type="submit" name="dodaj" class="btn btn-default" value="Dodaj">Spremi</button>
							</form>
					</div>
				</div>
				

		</div>

	</div>

</section> <!--/#cart_items-->				


<?php include_once 'footer.php'; ?>
<?php
		include_once 'script.php';
		?>
		


</body>



				