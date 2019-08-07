<?php
	header('Content-Type: text/html; charset=UTF-8');
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, 'compendium' );

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset( $conn,'utf8' );
?>