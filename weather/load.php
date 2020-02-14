<?php

date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
  echo "\n".date('d-m-Y h:i:s');

    $timestamp = date('d-m-Y H:i:s');
	$servername = "localhost";
	$username = "id8997449_weather";
	$password = "weather";
	$dbname = "id8997449_weather";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT value FROM weather";
	$result = $conn->query($sql);

	
	    while($row = $result->fetch_assoc()) {
	     echo "\t    \n    "."Temprature :" . $row["value"]. "°C";
	     $data = $row["value"];
	    }
	$conn->close();
?>
