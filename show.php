<?php
include('dbconnect.php');
if(!empty($_GET['id']) && isset($_GET['id'])){
  $sql = sprintf('SELECT * FROM `friends`, `areas` WHERE areas.area_id = friends.area_id AND friends.area_id=%s',$_GET['id']);
  $record = mysqli_query($db,$sql) or die(mysqli_error($db));
  while($table = mysqli_fetch_assoc($record)){
    $datas[] = $table;
  }
}else{
  header("index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>都道府県お友達システム</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    <div class="contents">
      <div class="contents_title">
        <h1><?php echo $datas[0]['area_name']; ?>友達一覧</h1>
      </div>
      <div class="well">
        男性:2名 女性:1名
      </div>
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th><div class="text-center">名前</div></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>山田太郎</td>
            <td>
              <a href="edit.html"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="javascript:void(0);" onclick="destroy();"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <tr>
            <td>安久昌和</td>
            <td>
              <a href="edit.html"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="javascript:void(0);" onclick="destroy();"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="button" class="btn btn-default" value="新規作成" onClick="location.href='new.html'">
    </div>
    <div class="copyright">
      <small>Copyright &copy; Core Creative Manager.All right reserved.</small>
    </div>
  </body>
</html>
