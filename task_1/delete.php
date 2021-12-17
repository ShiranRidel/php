<?php
//GUI - header
include "header.html";

//DB - Logic
include "DAL.php";

// $sql = "DELETE FROM students WHERE studentsId=" . $_GET['index'];

$result = connectToDB()->query("DELETE FROM students WHERE studentsId=" . $_GET['index']);

if($result == 1)
    echo  "student number " .$_GET['index'] ." deleted";

//GUI - Footer
include "footer.html";
// header( 'location : index.php');
// exit();
?>

