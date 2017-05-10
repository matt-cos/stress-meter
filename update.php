<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "stressmeter";
	$name = $_POST['name'];
	$level = $_POST['level'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE users SET level=$level WHERE name='$name'";

	if ($conn->query($sql) === TRUE) {
	    echo $name . " has been updated to level " . $level;
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>