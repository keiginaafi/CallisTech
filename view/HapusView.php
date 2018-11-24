<!DOCTYPE html>
<?php
  include '..\models\customer.php';
  use models\customer as customer;
  $custom = new customer;
  $allCus = $custom->getAllCus();
?>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="edit.css">
		</head>
		<body>
			<div id="form">
				<div>
          <p id="titleForm">Edit Customer</p>
					<table border="0" cellspacing="5" cellpadding="5" style="margin-bottom: 20px;">
            <thead style="text-align: center">
              <tr>
                <th>No.</th>
                <th>Customer No.</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Command</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //var_dump($allCus);
                while($row = $allCus->fetch_row()) {
                  echo "<tr>";
                  echo "<td>". $row[0] ."</td>";
                  echo "<td>". $row[1] ."</td>";
                  echo "<td>". $row[2] ."</td>";
                  echo "<td>". $row[3] ."</td>";
                  echo "<td>". $row[4] ."</td>";
                  echo "<td><a href=Hapus.php?id=".$row[0]." class=button style=text-align: center>Hapus</a></td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
          <a href="../index.php" id=butBack>Kembali</a>
				</div>
			</div>
		</body>
	</html>
