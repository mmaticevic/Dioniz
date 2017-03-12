						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="#">  <img src="images/nepoznato.jpg" alt="" />
</a>
										<h2><?php echo $vino->cijena ?> kn</h2>
										<h5><?php echo $vino->sorta_vina ?></h5>
										<p><?php echo $vino->naziv ?></p>

										<h5>   <?php echo $vino->godina_berbe ?></h5>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Dodati u  košaricu</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo $vino->cijena ?> kn</h2>
											<p><?php echo $vino->sorta_vina ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Dodati u  košaricu</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									<?php if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="korisnik"){
										?>	
										<li><a href="#"><i class="fa fa-plus-square"></i>Dodati na listu zelja</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Usporedba</a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>