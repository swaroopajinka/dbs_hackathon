<?php
session_start();
$fund = $_POST['fund'];

$amount = $_POST['amount'];
$email = $_POST['email'];

$cardnumber = $_POST['cardnumber'];
$expdate = $_POST['expdate'];
$cvcode = $_POST['cvcode'];
$cardowner = $_POST['cardowner'];


if(!empty($fund)|| !empty($amount)|| !empty($email)|| !empty($cardnumber) || !empty($expdate)|| !empty($cvcode) 
	|| !empty($cardowner)){
	//echo "inside if";
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "registration";
	
	//$port = "3306";
	//create a connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		$SELECT = "SELECT email From donor Where email = ? Limit 1";
		$userid = random_num(20);
		$INSERT = "INSERT Into donor (fund,amount,email,cardnumber,expdate,cvcode,cardowner) values( ?, ?, 
		?,?, ?, ?,?)";
		//prepare a statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		//if($rnum==0){
			$stmt->close();
			
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sisisis", $fund,$amount, $email, $cardnumber, $expdate, $cvcode, $cardowner);
			$stmt->execute();
			echo "New Record Inserted Successfully";
			header("Location: login_page.html");
			//<form action="choicemain.html" method="POST">
			//}
		//else{
			//echo "already registered  ";
			 
		//}
		$stmt->close();
		$conn->close();
	}
}
//else{
	//echo "All field are Required";
	//die();
//}
function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
?>