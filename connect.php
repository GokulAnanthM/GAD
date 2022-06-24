<?php
	
	$name = $_POST['name'];
	$feedback = $_POST['feedback'];
	$email = $_POST['email'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into gad(name,email,feedback) values(?, ?, ?)");
		$stmt->bind_param("sss", $name,$email, $feedback);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>