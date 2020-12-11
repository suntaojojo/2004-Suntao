<?php

$one = $_GET['cart_one_id'];
$two = $_GET['cart_two_id'];
$three = $_GET['cart_three_id'];
$page = $_GET['pagesize'];

$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT * FROM `goods`";
if($one != 'all') $sql .= " WHERE `cat_one_id`='$one'";
if($two != 'all') $sql .= " AND `cat_two_id`='$two'";
if($three != 'all') $sql .= " AND `cat_three_id`='$three'";
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);
$count = ceil(count($data) / $page);
echo json_encode($count);







?>