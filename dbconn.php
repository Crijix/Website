<?php
//connection to database
$dbhost     = "localhost";
$dbuser     = "root";
$dbpassword = "";
$database = "sql";

$connect=mysqli_connect($dbhost, $dbuser, $dbpassword, $database);

if ($connect->connect_error) {

    echo "error in database";

    die("Connection failed: " . $connect->connect_error);

}
?>