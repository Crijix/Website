<?php
// Connect to database
if(isset($_POST['sendBackup']))	{

	// Connect to mysql database using mysqli

    $connect = mysqli_connect('localhost', 'root', '', 'registration');

    // Check connection

    if($connect === false) {
        die("ERROR: Could not connect. ") . mysqli_connect_error();
    }

// Get current database
	// Delete current table
	$query = "TRUNCATE TABLE username";
	$result = mysqli_query($connect, $query);
	
	// Open backup file

	$filename = "Backup.txt";
	$handle = fopen($filename, 'r');
		
		// Read backup file
		fread($handle, filesize($filename));
		
		// Write to database
			// JSON DECODE
			
			// MySQL table's name
			$tableName = 'username';
			// Get JSON file and decode contents into PHP arrays/values
			$jsonFile = 'Backup.txt';
			//$jsonData = json_decode(file_get_contents($jsonFile), true);

			// Iterate through JSON and build INSERT statements
			foreach ($jsonData as $id=>$row) {
    			$insertPairs = array();
    			foreach ($row as $key=>$val) {
        			$insertPairs[addslashes($key)] = addslashes($val);
    			}

   					$insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
   					$insertVals = '"' . implode('","', array_values($insertPairs)) . '"';

    		$query = "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";
    		$result = mysqli_query($connect,$query);

			}

			if ($result) {
        		echo 'Backup Restored!';
    		} else {
       			echo 'Backup Failed!';
    		}

	// Close database
	mysqli_close($connect);
}

?>