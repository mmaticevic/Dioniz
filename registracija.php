<?php include_once 'config.php'; 

include_once 'function/ispisosoba.php';
$poruka=array();

if (isset($_POST["dodaj"])) {
	$nacin="insert";
	include_once 'predlozak/kontrola_korisnik.php';
	
	if(count($poruka)==0){
		unset($_POST["lozinkaponovno"]);

	//INSERT OSOBA

	$izraz = $veza -> prepare("INSERT into osoba(oib,ime,prezime,adresa,mjesto,telefon,mobitel,email) values (:oib,:ime,:prezime,:adresa,:mjesto,:telefon,:mobitel,:email)");
	$izraz -> bindParam(':oib', $_POST['oib'], PDO::PARAM_STR);
	$izraz -> bindParam(':ime', $_POST['ime'], PDO::PARAM_STR);
	$izraz -> bindParam(':prezime', $_POST['prezime'], PDO::PARAM_STR);
	$izraz -> bindParam(':adresa', $_POST['adresa'], PDO::PARAM_STR);
	$izraz -> bindParam(':mjesto', $_POST['mjesto'], PDO::PARAM_STR);
	$izraz -> bindParam(':telefon', $_POST['telefon'], PDO::PARAM_STR);
	$izraz -> bindParam(':mobitel', $_POST['mobitel'], PDO::PARAM_STR);
	$izraz -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	//$izraz -> bindParam(':slika', $_POST['slika'], PDO::PARAM_STR);
	$izraz -> execute();
	
	$id_osobe = $veza->lastInsertId('id');

	//INSERT OPERATER

	$izraz = $veza -> prepare("insert into operater(korisnicko_ime,lozinka,uloga,aktivan) values (:korisnicko_ime,MD5(:lozinka),:uloga,true)");
	$izraz -> bindParam(':korisnicko_ime', $_POST['korisnicko_ime'], PDO::PARAM_STR);
	$izraz -> bindParam(':lozinka', $_POST['lozinka'], PDO::PARAM_STR);
	$korisnik = "korisnik";
	$izraz -> bindParam(':uloga', $korisnik, PDO::PARAM_STR);
	$izraz -> execute();
	
	$id_operater = $veza->lastInsertId('id');
	
	//INSERT KLIJENT
	
	$izraz = $veza -> prepare("insert into kupac(osoba,datumunosa,datumpromjene,operater) values (:osoba,now(),now(),:operater)");
	$izraz -> bindParam(':osoba', $id_osobe, PDO::PARAM_INT);
	$izraz -> bindParam(':operater', $id_operater, PDO::PARAM_INT);

	$izraz -> execute();
		header("location: index.php");
	}
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
							
								<?php include_once 'include/atributi_korisnik.php'; ?>

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



				