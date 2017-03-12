
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
			<a target="_blank" href="http://www.lagermax-aed.hr/"><img src="img/lagermax.jpg" alt="lagermax" /></a>
		</div><!--/shipping-->

	</div>
</div>

<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Ponuda</h2>
		<?php

		$poStranici=6;

		$izraz = $veza -> prepare("select count(id) from vino");
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
			SELECT  a.id, b.naziv, c.boja, a.sorta_vina, a.zapremnina,a.kvaliteta_vina, a.postotak_alkohola, a.godina_berbe, a.cijena, a.slika 
			from vino a 
			inner join vinarija b on a.vinarija = b.id
			inner join boja_vina c on a.boja_vina =c.id
			order by a.id limit :odKuda, :poStranici;


			");
		$izraz -> execute(array("odKuda"=>$odKuda,"poStranici"=>$poStranici));
		$niz = $izraz -> fetchAll(PDO::FETCH_OBJ);
		foreach ($niz as $vino) {
			include 'content_vina.php';
		}
		?>



	</div>

</div><!--features_items-->

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


</div>
</section>
