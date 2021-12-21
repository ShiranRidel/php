<?php
//task_4 - referencing

$db1 = new mysqli('localhost','root','ridel7690','json_placeholder');

ini_set('memory_limit', '-1');

// conecting user(id,name) to post(title) to comment(body)
foreach ( $db1->query("
 SELECT DISTINCT users.id, posts.title , users.name, comments.body
  from posts
  CROSS join users
  ON posts.userId=users.id
  CROSS join comments
  ON posts.id=comments.postId
  GROUP BY userId ") as $row ) {

    // print_r($row);
    

    echo "<b>id > form user table: </b>".$row['id'] . "<br>";
    echo "<b>name > form user table: </b> ".$row['name']."<br>";
    echo "<b>title > form posts table: </b> ".$row['title']."<br>";
    echo "<b>body > form comments table:  </b>".$row['body']."<br><hr>";

};

$db1->close();

?>
