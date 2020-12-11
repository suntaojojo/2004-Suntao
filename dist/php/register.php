<?php

$password = $_POST['password'];
$account = $_POST['account'];
$nickname = $_POST['nickname'];
$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "INSERT INTO `user` VALUES(NULL , '$account' , '$password' , '$nickname')";
$res = mysqli_query($link , $sql);


echo json_encode(array(
  'messages'=>'数据已经成功进行了传输',
  'code'=>1
))






?>