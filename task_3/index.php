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

echo '<br/>';

$sql_users = "INSERT INTO `users` (`id`,`name`,`username`,`email`)
                      VALUES (:id, :name, :username , :email)";
$stm = $db->prepare($sql_users);



// parse JSON
$arr = json_decode($json_users, true);
$i = 0;

foreach ($arr as $record) {

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
?>

</body>
</html>