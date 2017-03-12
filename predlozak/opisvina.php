<?php include_once '../config.php'; 



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once '../head.php'; ?>

</head>
<body>

	<?php include_once '../header.php'; ?>


	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategorije</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Vinarije
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<?php 
											$izraz=$veza->prepare("SELECT naziv from vinarija group by id ");


											$izraz->execute();
											$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);

											foreach ($rezultati as $vinarija): ?>



											<li><a href=""><?php echo $vinarija -> naziv;  ?></a></li>

										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#mens">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										Vina
									</a>
								</h4>
							</div>
							<div id="mens" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<?php 
										$izraz=$veza->prepare("SELECT boja  from boja_vina group by  boja ");

										$izraz->execute();
										$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);

										foreach ($rezultati as $boja): ?>



										<li><a href=""><?php echo $boja -> boja;  ?></a></li>

									<?php endforeach; ?>




								</ul>
							</div>
						</div>
					</div>




				</div><!--/category-products-->

				<div class="brands_products"><!--brands_products-->
					<h2>VINA</h2>
					<div class="brands-name">
						<ul class="nav nav-pills nav-stacked">
							<!--Sorting wine-->
							<?php 
							$izraz=$veza->prepare("select sorta_vina as vina, count(id) as zbroj from vino
								group by  sorta_vina ");
							$izraz->execute();
							$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);

							foreach ($rezultati as $vino): ?>



							<li><a href=""> <span class="pull-right">(<?php echo $vino -> zbroj; ?>)</span><?php echo $vino -> vina;  ?></a></li>

						<?php endforeach; ?>
						<!--/Sorting wine-->
					</ul>
				</div>
			</div><!--/brands_products-->

			<div class="price-range"><!--price-range-->
				<h2>Cjenovni rang</h2>
				<div class="well text-center"> <b class="pull-center">HRK</b>
					<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[150,450]" id="sl2" ><br />
					<b class="pull-left"> 0</b>  <b class="pull-right" > 600</b>

				</div>

			</div><!--/price-range-->

			<div class="shipping text-center"><!--shipping-->
				<a target="_blank" href="http://www.lagermax-aed.hr/"><img src="../img/lagermax.jpg" alt="lagermax" /></a>
			</div><!--/shipping-->

		</div>
	</div>

	<?php 
	$izraz = $veza -> prepare("
		SELECT  a.id, b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina, a.postotak_alkohola, a.opis, a.godina_berbe, a.cijena  
		from vino a 
		inner join vinarija b on a.vinarija = b.id
		inner join boja_vina c on a.boja_vina =c.id 
		where a.id=:id
		");
	$izraz -> execute($_GET);
	$niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
	foreach ($niz as $vino): ?> 

	<div class="col-sm-9 padding-right" >
		<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Opis</h2>
			<div class="col-sm-12 padding-right" >
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5" style="border: solid black 1px">
						<div class="view-product">
							<?php 
							$putanjaslika = $_SERVER["CONTEXT_DOCUMENT_ROOT"] . $putanja."/img/vina/". $vino->id . ".jpg";

							if(file_exists($putanjaslika)){
								$alikavina=$putanja . "/img/vina/" . $vino->id . ".jpg";
							}
							else{
								$alikavina=$putanja . "/img/vina/nepoznato.jpg";;
							}
							?>
							<a href="#">  <img src="<?php echo $alikavina ?>" alt="nema slike" class="img-thumbnail"></a>
						</div>

					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->

							<h2><?php echo $vino->sorta_vina . " " . $vino->zapremnina ?>l</h2>
							<h6><?php echo $vino->boja?></h6>
							<p>Postotak alkohola: <?php echo $vino->postotak_alkohola?></p>
							<h6 style="font-weight: bold;"><?php echo $vino->naziv?></h6>
							
							<p><?php echo $vino->godina_berbe?></p>
							
							<h5 style="font-family: "Comic Sans MS", cursive, sans-serif "><?php echo $vino->opis?></h5>
							
								<h3><?php echo $vino->cijena?> kn</h3>
								<div class="container">




									<div class="col-lg-2">
										<div class="input-group">

											<button type="button" class="quantity-left-minus"  data-type="minus" data-field="">
												<
											</button>
										</span>
										<input type="number" id="quantity" name="quantity" value="1" min="1" max="100">

										<button type="button" class="quantity-right-plus" data-type="plus" data-field="">
											>
										</button>
										<a class="btn btn-success" href="cartAction.php?id=<?php echo $vino-> id; ?>">Dodaj ukošaricu</a>
									</span>
								</div>


							</div>







						</span>

					<?php endforeach; ?>

				</div><!--/product-information-->
			</div>
		</div>


	</div>

</div><!--features_items-->


</div>
</div>
</div>


</div>
</section>

<?php include_once '../footer.php'; ?>

<?php include_once '../script.php'; ?>
<script>
	$(document).ready(function(){

		var quantitiy=0;
		$('.quantity-right-plus').click(function(e){

    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    var quantity = parseInt($('#quantity').val());
    
    // If is not undefined

    $('#quantity').val(quantity + 1);


        // Increment

    });

		$('.quantity-left-minus').click(function(e){
    // Stop acting like a button
    e.preventDefault();
    // Get the field name
    var quantity = parseInt($('#quantity').val());
    
    // If is not undefined

        // Increment
        if(quantity>0){
        	$('#quantity').val(quantity - 1);
        }
    });

	});
</script>
</body>
</html>					
