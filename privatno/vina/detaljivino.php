					     
<div class="col-sm-4">

	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<a href="#">  <img src="img/<?php 

					if (file_exists("img/" . $vino->id . ".jpg")) {
						echo $vino->id;
					}else{
						echo "nepoznato";
					}



					?>.jpg" alt="..." class="img-thumbnail"></a>
				</a>
				<h3 style="font-weight: bold;"><?php echo $vino->sorta_vina . " " . $vino->zapremnina?> l</h3>
				<h4><?php echo $vino->cijena ?> kn</h4>				
				<p>Alkohol <?php echo $vino->postotak_alkohola ?> %</p>
				<p><?php echo $vino->boja ?></p>
				<p style="color:red;"><?php echo $vino->naziv ?></p>
				<p><?php echo $vino->kvaliteta_vina ?></p>
				<p>Stanje: <?php echo $vino->stanje_skladista ?> kom</p>
				<h5>   <?php echo $vino->godina_berbe ?></h5>
				<p>Dodano: <?php echo $vino->kreirano ?> </p>

				
				<a href="brisanje.php?id=<?php echo $vino->id ?>" class="btn btn-danger btn-block"><i class="fa fa-eraser" aria-hidden="true"></i></a>
				<a href="promjena3.php?id=<?php echo $vino->id ?>" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true"></i></a>
				 
				
			</div>
			
		</div>
		
	</div>
</div>