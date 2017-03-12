<?php include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
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
						<h2 class="title text-center">Korisnik</h2>
              
<a href="dodaj.php?" class="btn btn-success ">Dodaj<a><br><hr>
						<?php 

	$poStranici=30;
      
      $izraz = $veza -> prepare("select count(oib) from osoba");
      $izraz -> execute();
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
      

      $izraz = $veza -> prepare("
       select  a.oib, a.ime, a.prezime, a.adresa, b.naselje, a.telefon, a.mobitel, a.email
from osoba a
inner join mjesto b on a.mjesto = b.id limit :odKuda, :poStranici;


        ");
      $izraz -> execute(array("odKuda"=>$odKuda,"poStranici"=>$poStranici));
      $niz = $izraz -> fetchAll(PDO::FETCH_OBJ);

      foreach ($niz as $osoba) {
	 
	 include 'detaljikorisnik.php';	
	}

?>




					</div>
						<!--Pagination-->
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
                  <li><a href="<?php echo "?stranica=" . ($stranica+10) ?>">+10</a></li>
								<li><a href="<?php echo "?stranica=" . ($stranica+1) ?>"><i class="fa fa-angle-double-right"></i></a></li>
							</ul>
						</div>	
	<!--/Paginaion-->
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
	
</body>
</html>