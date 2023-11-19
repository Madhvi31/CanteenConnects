<?php
	$Name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['phone_number'];
	$message = $_POST['message'];

// Database connection
	$conn = new mysqli('localhost','root','','project');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name,email,phone_number,message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $Name, $email, $number,$message);
		$execval = $stmt->execute();
		echo $execval;
		echo "feedback saved ...";
		$stmt->close();
		$conn->close();
	}
?>