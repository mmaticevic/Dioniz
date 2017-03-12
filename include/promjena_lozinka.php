<?php

include_once 'config.php';

$izraz = $veza -> prepare("update operater set lozinka=:lozinka where id=:id");

$l=$_POST['lozinka'];
$s=$_POST['id'];
	$izraz -> bindParam(':lozinka', $l);
	$izraz -> bindParam(':id', $s);
	$izraz -> execute();


echo "OK";
