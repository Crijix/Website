<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    // get values form input text and number

    $name = $_POST['name'];
    $lazy = $_POST['lazy'];
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect('localhost', 'root', '', 'sql');

    // Check connection

    if($connect === false) {
        die("ERROR: Could not connect. ") . mysqli_connect_error();
    }
    
    // mysql query to insert data

    $query = "INSERT INTO `minions`(`name`, `lazy`) VALUES ('$name', '$lazy')";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if ($result) {
        echo 'Data Inserted';
    } else {
        echo 'Data Not Inserted';
    }
    
    //mysqli_free_result($result);
    mysqli_close($connect);
}

?>