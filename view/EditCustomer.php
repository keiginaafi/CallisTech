<!DOCTYPE html>
<?php
  $id = $_GET['id'];
	//include '..\controllers\TambahController.php';
	include '..\models\customer.php';
	//use controllers\TambahController as tambah;
	use models\customer as customer;
	$custom = new customer;
  $result = $custom->getCustomer($id);
  while($obj = $result->fetch_object()){
    $custom->setCustomerNum($obj->customer_no);
    $custom->setName($obj->name);
		$custom->setPhone($obj->phone);
		$custom->setAddress($obj->address);
  };
	//$control = new tambah;
	if(isset($_POST["submit"])){
		$custom->setCustomerNum($_POST['customerNum']);
		$custom->setName($_POST['name']);
		$custom->setPhone($_POST['phone']);
		$custom->setAddress($_POST['address']);
		$custom->editCus($id);
	}
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="tambah.css">
		</head>
		<body>
			<div id="form">
        <form action="" method="POST">
          <p id="titleForm">Edit Customer - <?php echo $custom->getCustomerNum() ?></p>
          <div class="group">
            <Label class="lab1">Customer No.</label>
            <input type="text" size="30" name="customerNum" value="<?php echo $custom->getCustomerNum() ?>" readonly>
          </div>
          <div class="group">
            <Label class="lab1">Name*</label></br>
            <input type="text" size="30" name="name" value="<?php echo $custom->getName() ?>" required>
          </div>
          <div class="group">
            <label class="lab1">Phone*</label></br>
            <input type="text" size="30" name="phone" value="<?php echo $custom->getPhone() ?>" required>
          </div>
          <div class="group">
            <label class="lab1">Address*</label></br>
            <input type="text" size="30" name="address" value="<?php echo $custom->getAddress() ?>" required>
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
