					     
					<div class="col-sm-4">

							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="#">  <img src="img/<?php 

                if (file_exists("img/" . $osoba->oib . ".jpg")) {
                    echo $osoba->oib;
                }else{
                    echo "nepoznato";
                }



                 ?>.jpg" alt="..." class="img-thumbnail"></a>
										<h5><?php echo $osoba->ime  ?> </h5>
										<h5> <?php echo $osoba->prezime ?></h5>
										<h4>OIB: <?php echo $osoba->oib ?></h4>
										<h5><?php echo $osoba->email==null ? "&nbsp" : $osoba->email ?></h5>
										 <h5> <?php echo $osoba->naselje ?></h5>
										<a href="brisanje.php?id=<?php echo $osoba->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a>
										<a href="promjena.php?id=<?php echo $vinarija->id ?>" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true"></i></a>

									</div>
									
								</div>
								
							</div>
						</div>				


				