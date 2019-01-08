<?php

include("conn_mysqli.php");

$sql = "SELECT * FROM actors LIMIT 10";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)){
  echo '<pre>';
    echo $row['id'];
  echo '</pre>';
};

 ?>
