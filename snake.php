<?php

// php code to Insert data into mysql database from input text
if(isset($_GET['w1']))
{
    // get values form input text and number

    $score = $_GET['w1'];
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect('localhost', 'root', '', 'sql');

    // Check connection

    if($connect === false) {
        die("ERROR: Could not connect. ") . mysqli_connect_error();
    }
    
    // Take score from database
    $sql = "SELECT `score` FROM `scores` WHERE name = 'Vladimir';";
    $test = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($test);
        $var = $row['score'];

    // Take current score with score in database
    if ($_GET['w1'] > $var) {
    
        // mysql query to update data
        $query = "UPDATE `scores` SET `score`= $score WHERE name = 'Vladimir';";
    
    } else {

        echo 'You suck m8.';
    }

    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if ($result) {
        echo 'Your score have been saved to database!';
    } else {
        echo 'Data Not Inserted';
    }

    //mysqli_free_result($result);
    mysqli_close($connect);
    header('location:index.php');
}

?>