<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}

$pretraga="";
if(isset($_GET["pretraga"])){
	$pretraga="%" . $_GET["pretraga"] . "%";
}else {
	$pretraga="%";
}

$poStranici=40;

$izraz = $veza -> prepare("SELECT count(id) from boja_vina where boja like :pretraga;");
$izraz -> execute(array("pretraga" => $pretraga));
$ukupno = $izraz->fetchColumn();

$ukupnoStranica=ceil($ukupno/$poStranici);



if(isset($_GET["stranica"])){
	$stranica=$_GET["stranica"];
}else{
	$stranica=1;
}

if($stranica>$ukupnoStranica){
	$stranica=1;
}

if($stranica==0){
	$stranica=$ukupnoStranica;
}

$odKuda = $stranica*$poStranici-$poStranici;
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
					<h2 class="title text-center">Boja vina</h2>
					<div class="search_box pull-right">
						<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
							<input value="<?php echo str_replace("%","", $pretraga); ?>" type="text" id="pretraga" name="pretraga" placeholder="Pretraga"/>
						</form>
					</div>
					<a href="dodaj.php" class="btn btn-success ">Dodaj</a>
					<?php 

					
					

					$izraz = $veza -> prepare("
						SELECT * from boja_vina where boja like :pretraga limit :odKuda,:poStranici


						");
					$izraz -> execute(array("pretraga"=> $pretraga, "odKuda"=>$odKuda,"poStranici"=>$poStranici));
					$niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
					

					?>	

					<br>
					<table  style="width:95%; ">
						<tbody>

							<tr>
								<th>ID</th>
								<th>Boja vina</th>
								


							</tr>
							<br>
							<?php foreach ($niz as $boja): ?>
								

								<tr>
									<td><?php echo $boja -> id; ?></td>
									<td><?php echo $boja -> boja; ?></td>
									
									<td><a href="brisanje.php?id=<?php echo $boja->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a></td>
									<td><a href="promjena.php?id=<?php echo $boja->id ?>" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true"></i></a></td>

									
								</tr>

							<?php endforeach; ?>
						</tbody>
					</table>

					
					



				</div>
				<div class="pagination-area" style="text-align: center;">
					<ul class="pagination">

						<li><a href="<?php echo "?stranica=" . ($stranica-1) ?>"><i class="fa fa-angle-double-left"></i></a></li>



					</li>
					<?php 
					
					
					for($i=1;$i<=$ukupnoStranica;$i++):
						if($i==$stranica):
							?>
						<li><a href="?stranica=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php endif; ?>
				<?php  endfor; ?>


				<li><a href="<?php echo "?stranica=" . ($stranica+5) ?>">+5</a></li>
				<li><a href="<?php echo "?stranica=" . ($stranica+5) ?>">+10</a></li>
				<li><a href="<?php echo "?stranica=" . ($stranica+1) ?>"><i class="fa fa-angle-double-right"></i></a></li>
				
			</ul>
		</div>	
	</div>
</div>
</section>

<!-- /Admin panel -->
















<!-- footer -->
<?php include_once '../../footer.php'; ?>
<!-- /footer -->

<!-- script -->
<?php include_once '../../script.php'; ?>
<!-- /script -->
<body>
	<script>
		$("#pretraga").focus();
	</script>
</body>
</html>