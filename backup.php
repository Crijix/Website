<?php
	if(isset($_POST['backup'])) {

		// Connect to mysql database using mysqli

    	$connect = mysqli_connect('localhost', 'root', '', 'registration');

    	// Check connection

    	if($connect === false) {
        	die("ERROR: Could not connect. ") . mysqli_connect_error();
        }

    // mysql query

    $query = "SELECT * FROM `username`";

    $result = mysqli_query($connect, $query);

    // Creating array for json

    $arr = array();
    while($row = mysqli_fetch_assoc($result)) {
    	$arr[] = $row;
    }

    $json = json_encode($arr);

    // Creating json file for backup

    file_put_contents("Backup.txt", $json);
    echo file_get_contents("Backup.txt");

	}
?>