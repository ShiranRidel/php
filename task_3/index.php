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
$json_comments = file_get_contents('https://jsonplaceholder.typicode.com/comments/');
$json_albums = file_get_contents('https://jsonplaceholder.typicode.com/albums/');


echo '<br/>';
// users
$sql_users = "INSERT INTO `users` (`id`,`name`,`username`,`email`)
                      VALUES (:id, :name, :username , :email)";
$stm_users = $db->prepare($sql_users);

echo '<br/>';

//posts
$sql_posts = "INSERT INTO `posts` (`userid`,`id`,`title`,`body`)
                      VALUES (:userId, :id, :title , :body)";
$stm_posts = $db->prepare($sql_posts);

//comments
$sql_comments = "INSERT INTO `comments` (`postId`,`id`,`name`,`email`,`body`)
                      VALUES (:postId, :id, :name, :email , :body)";
$stm_comments = $db->prepare($sql_comments);

//albums
$sql_albums = "INSERT INTO `albums` (`userId`,`id`,`title`)
                      VALUES (:userId, :id, :title )";
$stm_albums = $db->prepare($sql_albums);

// parse JSON
$arr_users = json_decode($json_users, true);
$arr_posts = json_decode($json_posts, true);
$arr_comments = json_decode($json_comments, true);
$arr_albums = json_decode($json_albums, true);


$i = 0;

//users loop
foreach ($arr_users as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data_users = array(
        ':id' => $record['id'],
        ':name' => $record['name'],
        ':username' => $record['username'],
        ':email' => $record['email'],
        

       
    );
    var_dump($data_users);
    // inserting a record
    $stm_users->execute($data_users);
}

//posts loop
foreach ($arr_posts as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data_posts = array(
        ':userId' => $record['userId'],
        ':id' => $record['id'],
        ':title' => $record['title'],
        ':body' => $record['body'], 
    );
    
    var_dump($data_posts);
    // inserting a record
    $stm_posts->execute($data_posts);
}

//comments loop
foreach ($arr_comments as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data_comments = array(
        ':postId' => $record['postId'],
        ':id' => $record['id'],
        ':name' => $record['name'],
        ':email' => $record['email'],
        ':body' => $record['body'], 
 );
    
    var_dump($data_comments);
    // inserting a record
    $stm_comments->execute($data_comments);
}

//albums loop
foreach ($arr_albums as $record) {

    echo "==================Insert record " . $i ++ . "<br>";

    $data_albums = array(
        ':userId' => $record['userId'],
        ':id' => $record['id'],
        ':title' => $record['title'],
        
    );
    
    var_dump($data_albums);
    // inserting a record
    $stm_albums->execute($data_albums);
}

?>

</body>
</html>