<?php
/*
*submitForm.php
*@ author Conor Prunty, Kevin Clarke
*/
	$username = "root";
	$password = "root";
	$host = "localhost";
	$dbname = "mainDB";
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//enter ad into database
	$sql = "INSERT INTO advert (name, comments, location, category, price, WillAccept)
VALUES ('$_POST[name]', '$_POST[comments]', '$_POST[location]', '$_POST[category]', '$_POST[price]', '$_POST[WillAccept]')";
	
	if ($conn->query($sql) === TRUE) {
		header("Location: profile.php");
		// this statement is needed 
		die("Redirecting to profile.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?>