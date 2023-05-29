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
$delete_link = '';
if(isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($res);
  $article['title'] = htmlentities($row['title']);
  $article['description'] = htmlentities($row['description']);
  $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
    <form action="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
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
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2>
      <?=$article['title']?>
    </h2>
    <?=$article['description']?>
  </body>
</html>