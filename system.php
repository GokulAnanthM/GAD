<?php
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$email = $_POST['email'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(fname,lname,pass,cpass,email) values(?, ?, ?,?,?)");
		$stmt->bind_param("sssss", $fname,$lname,$pass,$cpass,$email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>