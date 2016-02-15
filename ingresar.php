<?php
//Las variables que viene desde el nuevoUsuario.html para hacer el ingreso a la base de datos
$email= $_POST['email'];
$pass= $_POST['pass'];
$primerNombre= $_POST['primerNombre'];
$segundoNombre= $_POST['segundoNombre'];
$primerApellido= $_POST['primerApellido'];
$segundoApellido= $_POST['segundoApellido'];
$numTelf= $_POST['numtelf'];

//variables fijas para la conexion con la base de datos
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "geomaps";

//Metodo que realiza la conexion a la base de datos

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 

//revision de que las variables que vienen desde nuevoUsuario.html no esten en blanco para asi proceder al ingreso a la base de dato

	if(empty($email) ||
	empty($pass) ||
	empty($primerNombre) || 
	empty($segundoNombre) || 
	empty($primerApellido) || 
	empty($segundoApellido)
	){
	header("Location: nuevoUsuario.html");
	exit();
	}

	//Llamado al procedimiento almacenado que inserta el usuario a la base de datos
	
	$sql = "CALL insertarPersona ('".$email."','".$primerNombre."','".$segundoNombre."','".$primerApellido."','".$segundoApellido."','".$pass."');";	
	
	$result = $conn->query($sql);
	
	$sql2 = "CALL validar ('".$email."','".$pass."');";	
		
	$result2 = $conn->query($sql2);


	//Despues de que se inserta a la base de datos lo manda a la pagina de log in
	if($result2->num_rows > 0){
		header("Location: login.html");
	}else{
		header("Location: nuevoUsuario.html");	
		
	}
	
?>
