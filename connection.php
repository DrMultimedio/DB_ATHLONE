<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tracktheculture";
	$conn = new mysqli($servername, $username, $password, $dbname);
	

	  if (!$conn->set_charset("utf8")) {
	      printf("Error loading character set utf8: %s\n", $mysqli->error);
	  } else {
	      //printf("Current character set: %s\n", $conn->character_set_name());
	  }

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

?>