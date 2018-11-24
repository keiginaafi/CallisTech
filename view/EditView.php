<!DOCTYPE html>
<?php
  include '..\models\customer.php';
  use models\customer as customer;
  $custom = new customer;
  $custom->getAllCus();
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="tambah.css">
		</head>
		<body>
			<div id="form">
				<div>
					<table>
            <tr>
              Customer No.
            </tr>
            <tr>
              Name
            </tr>
            <tr>
              Phone
            </tr>
            <tr>
              Address
            </tr>
          </table>
				</div>
			</div>
		</body>
	</html>
