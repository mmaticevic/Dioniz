<?php include_once '../../config.php'; 
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../../head.php'; ?>

</head>
<body>

<?php include_once '../../header.php'; ?>

<?php include_once '../../predlozak/profil2.php'; ?>

	<br><br><br><br>
	


<?php include_once '../../footer.php'; ?>

<?php include_once '../../script.php'; ?>
</body>	
</html>