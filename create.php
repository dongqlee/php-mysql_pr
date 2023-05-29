<?php

$conn = mysqli_connect(
  "localhost", 
  "root", 
  "111111", 
  "opentutorials"
);
$sql = "SELECT * FROM topic";
$res = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($res)) {
  $escaped_title = htmlentities($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, Web'
);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?php 
        echo $list;
      ?>
    </ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name="description" placeholder="description"></textarea></p>
      <p><button type="submit">submit</button></p>
    </form>
    
  </body>
</html>