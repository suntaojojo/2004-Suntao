<?php

$username = $_POST['username'];
$password = $_POST['password'];

$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);

if(count($data)){
  echo json_encode(array(
    'message' => '成功接受',
    'code' => 1,
    'data' => $data[0]['nickname']
  ));
}else{
  echo json_encode(array(
    'messages'=>'接受失败',
    'code' => 0
  
  ));
};







?>