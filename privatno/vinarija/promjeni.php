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
	$izraz=$veza->prepare("select * from vinarija where id=:id");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);	
}
if(isset($_POST["promjeni"])){
	
	$nacin="update";	
	include_once 'kontrolaunos.php';
	
	if(count($poruka)==0){
		
		
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare("UPDATE  vinarija
		set 
		oib=:oib,
		naziv=:naziv,
		adresa=:adresa,
		mjesto=:mjesto,
		telefon=:telefon,
		fax=:fax,
		mobitel=:mobitel,
		email=:email,
		web=:web,
		facebook=:facebook,
		logo=:logo,
		ziroracun=:ziroracun
		where id=:id");

		$izraz->bindParam("id",$_POST["id"]);
		$izraz->bindParam("oib",$_POST["oib"]);
		$izraz->bindParam("naziv",$_POST["naziv"]);
		$izraz->bindParam("adresa",$_POST["adresa"]);
		$izraz->bindParam("mjesto",$_POST["mjesto"]);
		$izraz->bindParam("telefon",$_POST["telefon"]);
		$izraz->bindParam("fax",$_POST["fax"]);
		$izraz->bindParam("mobitel",$_POST["mobitel"]);
		$izraz->bindParam("email",$_POST["email"]);
		$izraz->bindParam("web",$_POST["web"]);
		$izraz->bindParam("facebook",$_POST["facebook"]);		
		$izraz->bindParam("logo",$_POST["logo"]);
		$izraz->bindParam("ziroracun",$_POST["ziroracun"]);
	
		
		
		$izraz->execute();
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
						<h2 class="title text-center">Promjeni</h2>
						
						<div class="signup-form"><!--Reg form-->
						
							<form  method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
								<input type="text" name="id" value="<?php echo $_POST["id"] ?>">
							<?php include_once 'atributi.php'; ?>
								
							





							<a href="index.php" class="btn btn-success ">Odustani</a>	 	
							<button type="submit" name="promjeni" class="btn btn-default">Spremi</button>
						</form>
						
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