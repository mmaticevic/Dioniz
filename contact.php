<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'head.php'; ?>

</head>
<body>

	<?php include_once 'header.php'; ?>

	<div id="contact-page" class="container">
		<div class="bg">
			<div class="row">    		
				<div class="col-sm-12">    			   			
					<h2 class="title text-center"><strong>K</strong>ONTAKT </h2>    			    				    				
					<div id="gmap" class="contact-map" style="text-align: center;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5587.1295545328585!2d18.67153045974083!3d45.55908005300881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475ce707f6d935c9%3A0xb56bfa7a938d7ae3!2sZadarska+ul.+16%2C+31000%2C+Osijek!5e0!3m2!1shr!2shr!4v1483363764184"  height="450" frameborder="0" style="border:0; min-width: 90%; " allowfullscreen></iframe>
					</div>
				</div>	

			</div>   
			<br><br> 	
			<div class="row">  	
				<div class="col-sm-8">
					<div class="contact-form">
						<h2 class="title text-center">Kontakitrajte nas</h2>
						<div class="status alert alert-success" style="display: none"></div>
						<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
							<div class="form-group col-md-6">
								<input type="text" name="name" class="form-control" required="required" placeholder="Ime">
							</div>
							<div class="form-group col-md-6">
								<input type="email" name="email" class="form-control" required="required" placeholder="Email">
							</div>
							
							<div class="form-group col-md-12">
								<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Poruka..."></textarea>
							</div>                        
							<div class="form-group col-md-12">
								<input type="submit" name="submit" class="btn btn-primary pull-right" value="Pošalji">
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact-info">
						<h2 class="title text-center">Dioniz Info</h2>
						<address>
							<p >Wine shop DIONIZ</p>
							<p>Zadarska ul. 16</p>
							<p>31000 Osijek</p>
							<p>Hrvatska</p>
							<p>Mobitel: +385 99 661 4192 </p>
							<p>Telefon: </p>
							<p>Fax: </p>
							<p>Email: info@dioniz.hr</p>
						</address>
						
					</div>
				</div>    			
			</div>  
		</div>
		
	</div><!--/#contact-page-->
	<br>

	<?php include_once 'footer.php'; ?>

	<?php include_once 'script.php'; ?>

</body>
</html>