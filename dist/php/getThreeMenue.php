<?php



$one = $_GET['cart_one_id'];
$two = $_GET['cart_two_id'];

$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT `cat_three_id` FROM `goods` WHERE `cat_one_id`='$one' AND `cat_two_id`='$two' GROUP BY `cat_three_id`";
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);
echo json_encode($data);












?>