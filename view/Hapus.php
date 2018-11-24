<!DOCTYPE html>
<?php
  $id = $_GET['id'];
	//include '..\controllers\TambahController.php';
	include '..\models\customer.php';
	//use controllers\TambahController as tambah;
	use models\customer as customer;
	$custom = new customer;
  $result = $custom->hapusCus($id);
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="tambah.css">
		</head>
		<body>
			<a href="../index.php" id=butBack>Kembali</a>
		</body>
	</html>
