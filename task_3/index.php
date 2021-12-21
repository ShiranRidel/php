<!DOCTYPE html>
<html>
<body>

<?php

// db connection
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$db = new PDO('mysql:host=localhost;dbname=json_placeholder;', 'root', 'ridel7690', $options);

// download json from url
$json_users = file_get_contents('https://jsonplaceholder.typicode.com/users/');
$json_posts = file_get_contents('https://jsonplaceholder.typicode.com/posts/');

echo '<br/>';
// users
$sql_users = "INSERT INTO `users` (`id`,`name`,`username`,`email`)
                      VALUES (:id, :name, :username , :email)";
$stm = $db->prepare($sql_users);

echo '<br/>';

//posts
$sql_posts = "INSERT INTO `posts` (`userId`,`id`,`title`,`body`)
                      VALUES (:userId, :id, :title , :body)";
$stm1 = $db->prepare($sql_posts);


// parse JSON
$arr_users = json_decode($json_users, true);
$arr_posts = json_decode($json_posts, true);

$i = 0;

//users loop
foreach ($arr_users as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data = array(
        ':id' => $record['id'],
        ':name' => $record['name'],
        ':username' => $record['username'],
        ':email' => $record['email'],
        

       
    );
    var_dump($data);
    // inserting a record
    $stm->execute($data);
}

//posts loop
foreach ($arr_posts as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data1 = array(
        ':userId' => $record['userId'],
        ':id' => $record['id'],
        ':title' => $record['title'],
        ':body' => $record['body'], 
    );
    
    var_dump($data1);
    // inserting a record
    $stm1->execute($data1);

}
?>

</body>
</html>