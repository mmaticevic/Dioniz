<header id="header" ><!--header-->
	<div class="header_top "><!--header_top-->
			<div class="container ">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +385 99 661 4192</a></li>
								<li><a href="mailto: info@dioniz.hr"><i class="fa fa-envelope"></i>info@dioniz.hr</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a target="_blank" href="https://web.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a target="" href="#"><i class="fa fa-twitter"></i></a></li>
								
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle "><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo $putanja ?>index.php"><span>D</span>IONIZ</a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right ">
							<ul class="nav navbar-nav ">
								
							

								<?php if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="administrator"){
                				?>
                       			
                   
                    			<li>
                      				<a href="predlozak/profil.php?id=<?php echo $operater->id ?>"><i class="fa fa-user" aria-hidden="true"></i>Dobrodošao/la: <?php echo $_SESSION["autoriziran"]->korisnicko_ime ?></a>
                   			 	</li>
                    			
                    			<li>
                      				<a href="<?php echo $putanja ?>privatno/admin/index.php"><i class="fa fa-desktop" aria-hidden="true"></i>Admin panel</a>
                   			 	</li>

                 				<?php  }
                     				else if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="korisnik") {
                      			 ?>
                   
                   				<li>
                    			    <a href="<?php echo $putanja ?>predlozak/profil.php"><i class="fa fa-user"></i> Dobrodošao/la: <?php echo $_SESSION["autoriziran"]->korisnicko_ime ?></a>
                   				</li>
                    			<?php } ?>
                    			

								<?php if(isset($_SESSION["autoriziran"]) && $_SESSION["autoriziran"]->uloga=="korisnik"){
                				?>
								<li><a href="<?php echo $putanja ?>privatno/korisnik/wishlist.php"><i class="fa fa-star"></i> Lista želja</a></li>
								<?php } ?>

								
                				
                				
								<li><a href="<?php echo $putanja ?>cart.php"><i class="fa fa-shopping-cart"></i> Košarica</a></li>
							

								





								<li>   
                    				<?php  if(isset($_SESSION["autoriziran"])): ?>

                        			<a href="<?php echo $putanja ?>logout.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Odjava</a>
                    				<?php else: ?>
                   					 <a href="<?php echo $putanja ?>autorizacija.php"><i class="fa fa-lock"></i>Prijava</a>
                   					 
                					<?php endif; ?>
                   				</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo $putanja ?>index.php">Home</a></li>
								

                                   
                                </li> 
								<li class="nav navbar-nav"><a href="<?php echo $putanja ?>price.php">Vinske priče</a>
                                    
                                </li> 
								<li class="nav navbar-nav"><a href="<?php echo $putanja ?>contact.php"> Kontakt</a>
                                    
                                </li>
                               
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">

							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
</header><!--/header-->