<?php
	$ottusername = $_POST['ottusername'];
	$ottpassword = $_POST['ottpassword'];
	$ottage = $_POST['ottage'];
	$ottaddress = $_POST['ottaddress'];

// Database connection
	$conn = new mysqli('localhost','root','','testprojectsign');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into client(ottusername,ottpassword,ottage,ottaddress) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $ottusername, $ottpassword, $ottage,$ottaddress);
		$execval = $stmt->execute();
		echo $execval;
		echo "sign up successfull ...";
		$stmt->close();
		$conn->close();
	}
?>