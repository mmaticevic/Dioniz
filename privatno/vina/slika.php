<?php 
include_once '../../config.php';
if (!isset($_SESSION["autoriziran"]) || $_SESSION["autoriziran"] -> uloga != "administrator") {
	header("location: ../../index.php");
	exit;
}

if( !isset($_POST["id"])){
	header("location: ../../logout.php");
	exit;
}

$target_dir = $_SERVER["CONTEXT_DOCUMENT_ROOT"] . $putanja."img/vina/". $_POST["id"] . ".jpg";
						
						$naziv = basename($_FILES["imgFile"]["name"]);
						
						$target_file = $target_dir . $naziv;
						
						move_uploaded_file($_FILES["imgFile"]["tmp_name"], $target_file);
header("location: index.php");