     
					<div class="col-sm-4">

							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
														
										<h5><?php echo $osoba->ime  ?> </h5>
										<h5> <?php echo $osoba->prezime ?></h5>
										<h4>OIB: <?php echo $osoba->oib ?></h4>
										<h5><?php echo $osoba->email==null ? "&nbsp" : $osoba->email ?></h5>
										 	<label >Mjesto</label>

						
					

							<?php
							$izraz = $veza -> prepare("SELECT * FROM mjesto");
							$izraz -> execute();
							$rezultat = $izraz -> fetchAll(PDO::FETCH_OBJ);
							foreach ($rezultat as $mjesto) : ?>

							
							<?php if(isset($_POST["mjesto"]) && $_POST["mjesto"]==$mjesto->id){
								echo " selected=\"selected\" ";
							} ?>

							value="<?php echo $mjesto -> id; ?>"><?php echo $mjesto -> naselje; ?>
						<?php endforeach; 



						?>

										<a href="brisanje.php?id=<?php echo $osoba->id ?>" class="btn btn-danger btn-block "><i class="fa fa-eraser" aria-hidden="true"></i></a>
										<a href="#" class="btn btn-info btn-block "><i class="fa fa-refresh" aria-hidden="true"></i></a>

									</div>
									
								</div>
								
							</div>
						</div>				


				