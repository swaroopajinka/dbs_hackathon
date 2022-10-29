
<?php

// Username is root
$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "registration";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
// Check connection
if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}


$sql = "SELECT fund, amount, email,cardowner FROM donor" ;
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>donar Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>HISTORY OF DONOR</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>fund type</th>
				<th>amount</th>
				<th>email</th>
				<th>card owner</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['fund'];?></td>
				<td><?php echo $rows['amount'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['cardowner'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>