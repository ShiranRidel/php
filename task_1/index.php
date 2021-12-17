<?php
//GUI - header
include "header.html";

include "DAL.php";
    
    if(isset($_POST['Name']))
    {
        $temp =$_POST["Name"];
        //check data length
        if( strlen($temp) >2){
            $name =$_POST['Name'];
            $email =$_POST['email'];
            $sql = "INSERT INTO `students` (`name`,`email`)VALUES('$name','$email');";

            // echo $sql; 
            if (executeSQL($sql)) {
                echo "New record created successfully";
            } else {
                echo "Error";
            }     
        }
    }
?>

<html lang="en">
<body>
<h1>Add new student</h1>
    <form  method="POST">
        First Name: <input name="Name" >
        Email: <input name="email">
        <input type="submit">
    </form>
    <?php include "footer.html";?>
    
  </body>
</html>