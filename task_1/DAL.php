<?php
//please replace vars with your DB vars
$servername = "localhost";
$username = "id17485449_shiranridel123";
$password = "Aa!123456789";
$dbname = "id17485449_testdb";

//create connection to database
function connectToDB(){
    global $servername ,$username ,$password ,$dbname;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        return $conn; 
    }
}

//excute sql and return true if success , false if failer
function executeSQL($sql){
    global $conn; 
    $conn= connectToDB();
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>