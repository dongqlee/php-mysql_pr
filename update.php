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
$update_link = '';
if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($res);
  $article['title'] = htmlentities($row['title']);
  $article['description'] = htmlentities($row['description']);
  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
}
//print_r($article);

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
    <form action="process_update.php" method="POST">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
      <p><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
      <p><button type="submit">submit</button></p>
    </form>
    
  </body>
</html>