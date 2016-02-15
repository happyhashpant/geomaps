<?php
	$nusuario= $_POST['nusuario'];
	$pass= $_POST['password'];
	
	 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "geomaps";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 

	if(empty($nusuario) || empty($pass)){
	header("Location: login.html");
	exit();
	}
	
	$sql = "CALL validar ('".$nusuario."','".$pass."');";	
	
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		header("Location: intro.html");
	}else{
		header("Location: login.html");	
		
	}
	
?>
