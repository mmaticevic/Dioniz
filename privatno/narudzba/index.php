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
						<h2 class="title text-center">Narudžba</h2>

					</div>
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