<?php
require('dbconnect.php');
$user_id = $_GET['id'];
$sql = sprintf('SELECT * FROM `friends` WHERE `friend_id` = "%s"', $user_id);
$record = mysqli_query($db,$sql) or die(mysqli_error($db));
while($table = mysqli_fetch_assoc($record)){
  $datas[] = $table;
}

$area_id = $datas[0]['area_id'];

$sql = sprintf('DELETE FROM `friends` WHERE `friend_id` = "%s"', $user_id);
mysqli_query($db,$sql) or die(mysqli_error($db));

header("Location:show.php?id=$area_id");
exit();
 ?>
