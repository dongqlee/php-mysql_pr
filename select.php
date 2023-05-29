<?php

$conn = mysqli_connect(
  "localhost", 
  "root", 
  "111111", 
  "opentutorials"
);
// 1 row
echo "<h1>single row</h1>";
$sql = "SELECT * FROM topic WHERE id = 6";
$res = mysqli_query($conn, $sql);
//print_r(mysqli_fetch_array($res));
$row = mysqli_fetch_array($res);
//print_r($row);
//echo $row[0];
echo '<br />';
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];
// 결과의 자리수(배열), 컬럼의 이름으로 값을 가져올 수 있다. (연관배열)
//var_dump($res->num_rows);

echo "<h1>multi row</h1>";
$sql = "SELECT * FROM topic";
$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($res)) {
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}
// $row = mysqli_fetch_array($res);
// echo '<h2>'.$row['title'].'</h2>';
// echo $row['description'];
// $row = mysqli_fetch_array($res);
// echo '<h2>'.$row['title'].'</h2>';
// echo $row['description'];
// $row = mysqli_fetch_array($res);
// echo '<h2>'.$row['title'].'</h2>';
// echo $row['description'];
// $row = mysqli_fetch_array($res);
// echo '<h2>'.$row['title'].'</h2>';
// echo $row['description'];
// $row = mysqli_fetch_array($res);
// echo '<h2>'.$row['title'].'</h2>';
// echo $row['description'];
// $row = mysqli_fetch_array($res);
// var_dump($row);
?>