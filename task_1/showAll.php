<?php
//GUI - header
include "header.html";

include "DAL.php";

$sql = "SELECT * FROM students";
$conn = connectToDB();
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $id=$row["studentsId"];
    echo "id: " . $row["studentsId"]. " - Name: " . $row["Name"]. " - Email: " . $row["email"] . "&nbsp;
    <a  class='btn btn-danger' href=delete.php?index=$id>DELETE</a><br><br>";
  }
} else {
  echo "0 results";
}
$my_records = mysqli_query($conn,"select * from students"); // fetch data from database
$data = mysqli_fetch_array($my_records);
$id=$data['studentsId'];

if(isset($_POST['update'])) // when click on Update button
{
    $id = $_POST['studentsId'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
	
    $edit = mysqli_query($conn,"update `students` set name='$name', email='$email' where studentsId='$id'");
	  

    if($edit)
    {
      mysqli_close($conn); // Close connection

      exit;
                  header("location:showAll.php");


    }
    else
    {
        echo mysqli_error();
    }    

}

$conn->close();
?>
<html lang="en">
<body>
<h1>Edit student by id</h1>
    <form  method="POST">
                Id: <input name="studentsId" Required >
        First Name: <input name="Name" >
        Email: <input name="email">
        <input type="submit" name="update" value="Update">
    </form>
    <?php include "footer.html";?>
    
  </body>
</html>

<!--<?php include "footer.html";?>-->