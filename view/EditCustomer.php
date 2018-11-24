<!DOCTYPE html>
<?php
	//include '..\controllers\TambahController.php';
	include '..\models\customer.php';
	//use controllers\TambahController as tambah;
	use models\customer as customer;
	$custom = new customer;
	//$control = new tambah;
	if(isset($_POST["submit"])){
		$custom->setCustomerNum($_POST['customerNum']);
		$custom->setName($_POST['name']);
		$custom->setPhone($_POST['phone']);
		$custom->setAddress($_POST['address']);
		$custom->saveCus();
	}
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="tambah.css">
		</head>
		<body>
			<div id="form">
        <form action="" method="POST">
          <p id="titleForm">Create Customer - <?php echo $custom->getNewCustomerNum() ?></p>
          <div class="group">
            <Label class="lab1">Customer No.</label>
            <input type="text" size="30" name="customerNum" value="<?php echo $custom->getNewCustomerNum() ?>" readonly>
          </div>
          <div class="group">
            <Label class="lab1">Name*</label></br>
            <input type="text" size="30" name="name" value="" required>
          </div>
          <div class="group">
            <label class="lab1">Phone*</label></br>
            <input type="text" size="30" name="phone" required>
          </div>
          <div class="group">
            <label class="lab1">Address*</label></br>
            <input type="text" size="30" name="address" required>
          </div>
					<div class="group">
						<input type="submit" value="Submit" name="submit" size="30">
						<a href="../index.php" id=butBack>Kembali</a>
					</div>
        </form>
			</div>
		</body>
	</html>
>
