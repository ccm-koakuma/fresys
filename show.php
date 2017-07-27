<?php
require('dbconnect.php');
if(!empty($_GET['id']) && isset($_GET['id'])){
$sql=sprintf('SELECT * FROM `friends`,`areas` WHERE friends.area_id=areas.area_id AND friends.area_id=%s', $_GET['id']);
$record=mysqli_query($db,$sql) or die(mysqli_error($db));
while($table=mysqli_fetch_assoc($record)){
    $datas[] = $table;
    }
    $count=count($datas);
echo "<pre>";
print_r($datas);
echo "</pre>";
}else{
  header('LOcation: index.php');
  exit();
  }
  $datas_male = 0;
  $datas_female = 0;
  for($i=0; $i<$count; $i++){
   if(isset($datas[$i]['gender']) && $datas[$i]['gender'] == 'm'){
    $datas_male += 1;
   }elseif(isset($datas[$i]['gender']) && $datas[$i]['gender'] == 'f'){
    $datas_female += 1;
   }
  }
?>