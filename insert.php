<?php

$conn = mysqli_connect("localhost", "root", "111111", "opentutorials");
$sql = "
  INSERT INTO topic (
    title,
    description,
    created
  ) VALUES (
    'MySQL',
    'MySQL is ...',
    NOW()
  )";  
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo mysqli_error($conn);
}
// $row = $result->fetch_assoc();
// echo htmlentities($row['_message']);



?>