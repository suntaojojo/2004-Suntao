<?php

$goods_id = $_GET['goodsId'];
$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT * FROM `goods` Where `goods_id`='$goods_id'";
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);
echo json_encode($data);



?>