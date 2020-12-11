<?php

$one =$_GET['cart_one_id'];
$two =$_GET['cart_two_id'];
$three=$_GET['cart_three_id'];

$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT `cat_two_id` FROM `goods` Where `cat_one_id`='$one' GROUP BY `cat_two_id`";
// echo json_encode($sql);
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);
echo json_encode($data);





?>