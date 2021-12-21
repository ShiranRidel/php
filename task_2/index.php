<?php
//users
$url_users = 'https://jsonplaceholder.typicode.com/users/';
$cURL_users = curl_init();
curl_setopt($cURL_users, CURLOPT_URL, $url_users);
curl_setopt($cURL_users, CURLOPT_HTTPGET, true);
curl_setopt($cURL_users, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURL_users, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result_users = curl_exec($cURL_users);
curl_close($cURL_users);
$arrays_users =  json_decode($result_users);
// echo $arrays_users[0]->id;

//posts
$url_posts = 'https://jsonplaceholder.typicode.com/posts/';
$cURL_posts = curl_init();
curl_setopt($cURL_posts, CURLOPT_URL, $url_posts);
curl_setopt($cURL_posts, CURLOPT_HTTPGET, true);
curl_setopt($cURL_posts, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURL_posts, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result_posts = curl_exec($cURL_posts);
curl_close($cURL_posts);
$arrays_posts =  json_decode($result_posts);


//comments
$url_comments = 'https://jsonplaceholder.typicode.com/comments/';
$cURL_comments = curl_init();
curl_setopt($cURL_comments, CURLOPT_URL, $url_comments);
curl_setopt($cURL_comments, CURLOPT_HTTPGET, true);
curl_setopt($cURL_comments, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURL_comments, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result_comments = curl_exec($cURL_comments);
curl_close($cURL_comments);
$arrays_comments =  json_decode($result_comments);


//albums
$url_albums = 'https://jsonplaceholder.typicode.com/albums/';
$cURL_albums = curl_init();
curl_setopt($cURL_albums, CURLOPT_URL, $url_albums);
curl_setopt($cURL_albums, CURLOPT_HTTPGET, true);
curl_setopt($cURL_albums, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURL_albums, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result_albums = curl_exec($cURL_albums);
curl_close($cURL_albums);
$arrays_albums =  json_decode($result_albums);

//photos
$url_photos = 'https://jsonplaceholder.typicode.com/photos/';
$cURL_photos = curl_init();
curl_setopt($cURL_photos, CURLOPT_URL, $url_photos);
curl_setopt($cURL_photos, CURLOPT_HTTPGET, true);
curl_setopt($cURL_photos, CURLOPT_RETURNTRANSFER, true);

curl_setopt($cURL_photos, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
));

$result_photos = curl_exec($cURL_photos);
curl_close($cURL_photos);
$arrays_photos =  json_decode($result_photos);
?>

<!-- ------------------------------ html start  ------------------------------------- -->

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>PHP TASK</title>
            <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
            <meta name="description" content="HTML, PHP, JSON, REST API">
            <style>table, th, td {border: 1px solid black;}</style>
        </head>
    <body>
        <!-- <?php foreach ($arrays as $value)  {    ?>
            <div  style="width:80px;border:2px solid black;height:20px;"> <?php echo 'User ID: ' . $value -> userId ?> </div><br /> 
            <div style="width:50px;border:2px solid black;height:20px;"> <?php echo 'ID: ' . $value -> id ?> </div><br /> 
            <div style="width:550px;border:2px solid black;height:20px;"> <?php echo 'Title: ' . $value -> title ?> </div><br /> 
            <div style="width:90px;border:2px solid black;height:20px;"> <?php echo 'Completed: ' .(( $value -> completed )?1:0) ?> </div><br /> 
            <br />   
        <?php  } ?> -->

<!-- ------------------------------ sherch posts ------------------------------------- -->

<form action="#" method="POST" style="search-style";>
    <input type="text" name="Title" placeholder="Enter Title of post..." >
    <button type="submit" name="submit_search">Search</button>
</form>

<div>
    <?php
    if(isset($_POST['submit_search']) && !empty($_POST['Title'])) {
        $Title = $_POST['Title'];
        foreach($arrays_posts as $value) {
            if(strpos($value->title, $Title) !== false) {
                echo "Title : ";
                echo $value->title ."<br/>";
                echo " post Id : " ;
                echo $value->id ."<br/>";
            }
        }
    }
    ?>
</div>
<!-- ------------------------------ end sherch posts --------------------------------- -->
<hr>
<!-- ------------------------------ sherch users-------------------------------------- -->

<form action="#" method="POST" style="search-style1";>
    <input type="text" name="name" placeholder="Enter user name..." >
    <button type="submit" name="submit_search1">Search</button>
</form>

<div>
    <?php
    if(isset($_POST['submit_search1']) && !empty($_POST['name'])) {
        $userName = $_POST['name'];
        foreach($arrays_users as $value) {
            
            if(stripos($value->name, $userName) !== false ) {
                echo "name : ";
                echo $value->name ."<br/>";
                echo "userId : " ;
                echo $value->id ."<br/>";
                echo "username : " ;
                echo $value->username ."<br/>";
                echo "email : " ;
                echo $value->email ."<br/>";
                
            }
        }
    }
    ?>
</div>

<!-- ------------------------------ end sherch users ---------------------------------- -->
<hr>
<H1>users:</H1>

<!-- ------------------------------ users table---------------------------------------- -->

<table style="width:70%"; class="data-table">
            <tr>
                <th> User ID:</th> 
                <th> name:</th> 
                <th>username:</th>
                <th>email</th>
            </tr>
            <?php foreach ($arrays_users as $value)  {    ?>
                <tr>
                    <td><?php echo $value -> id ?> </td> 
                    <td><?php echo $value -> name ?> </td> 
                    <td><?php echo $value -> username ?> </td>
                    <td><?php echo $value -> email ?> </td>
                </tr>
            <?php  } ?>
</table>
<!-- ------------------------------end users table------------------------------------- -->
<hr>
<H1>posts:</H1>

<!-- --------------------------------posts table--------------------------------------- -->
<table style="width:80%"; class="data-table">
            <tr>

                <th> User ID:</th> 
                <th> post ID:</th> 
                <th>Title:</th>
                <th>body</th>
            </tr>
            
            <?php foreach ($arrays_posts as $value)  {    ?>
               
                <tr>
                    <td><?php echo $value -> userId ?> </td> 
                    <td><?php echo $value -> id ?> </td> 
                    <td><?php echo $value -> title ?> </td>
                    <td><?php echo $value -> body ?> </td>
                </tr>
              
            <?php  } ?>
</table>
<!-- ------------------------------end posts table------------------------------------ -->
<hr>
<H1>comments:</H1>
<!-- --------------------------------comments table--------------------------------------- -->
<table style="width:80%"; class="data-table">
            <tr>

                <th> postId:</th> 
                <th> comments ID:</th> 
                <th>name:</th>
                <th>email:</th>
            </tr>
            
            <?php foreach ($arrays_comments as $value)  {    ?>
               
                <tr>
                    <td><?php echo $value -> postId ?> </td> 
                    <td><?php echo $value -> id ?> </td> 
                    <td><?php echo $value -> name ?> </td>
                    <td><?php echo $value -> email ?> </td>
                </tr>
              
            <?php  } ?>
</table>
<!-- ------------------------------end posts table------------------------------------ -->
<hr>
<h1>albums:</h1>
<!-- --------------------------------albums table--------------------------------------- -->
<table style="width:50%"; class="data-table">
            <tr>

                <th> userId:</th> 
                <th> comments ID:</th> 
                <th>title:</th>
            </tr>
            
            <?php foreach ($arrays_albums as $value)  {    ?>
               
                <tr>
                    <td><?php echo $value -> userId ?> </td> 
                    <td><?php echo $value -> id ?> </td> 
                    <td><?php echo $value -> title ?> </td>
                </tr>
              
            <?php  } ?>
</table>
<!-- ------------------------------end albums table------------------------------------ -->
<hr>
<h1>photos:</h1>
<!-- --------------------------------albums table--------------------------------------- -->
<table style="width:90%"; class="data-table">
            <tr>

                <th> albumId:</th> 
                <th> photo ID:</th> 
                <th>title:</th>
                <th>url:</th>
                <th>thumbnail Url:</th>

            </tr>
            
            <?php foreach ($arrays_photos as $value)  {    ?>
               
                <tr>
                    <td><?php echo $value -> albumId ?> </td> 
                    <td><?php echo $value -> id ?> </td> 
                    <td><?php echo $value -> title ?> </td>
                    <td><?php echo $value -> url ?> </td>
                    <td><?php echo $value -> thumbnailUrl ?> </td>

                </tr>
              
            <?php  } ?>
</table>
<!-- ------------------------------end albums table------------------------------------ -->
  </body>
</html>
<!-- -------------------------------- html end  --------------------------------------- -->
