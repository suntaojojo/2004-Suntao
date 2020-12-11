<?

$cart_one_id = $_GET['cart_one_id'];
$cart_two_id = $_GET['cart_two_id'];
$cart_three_id = $_GET['cart_three_id'];
$method = $_GET['method'];
$method_type = $_GET['method_type'];
$pagesize = $_GET['pagesize'];
$current = $_GET['current'];

$link = mysqli_connect('localhost' , 'root' , 'root' , 'bk2004');
$sql = "SELECT * FROM `goods`";
if($cart_one_id != 'all') $sql .= " WHERE `cat_one_id`='$cart_one_id'";
if($cart_two_id != 'all') $sql .= " AND `cat_two_id`='$cart_two_id'";
if($cart_three_id != 'all') $sql .= " AND `cat_three_id`='$cart_three_id'";
$start = ($current - 1) * $pagesize;
if($method_type != '综合') $sql .= " ORDER BY `goods_price` $method  LIMIT $start , $pagesize";
if($method_type != '价钱') $sql .= " ORDER BY `goods_id` $method LIMIT $start , $pagesize";



// echo $sql;
$res = mysqli_query($link , $sql);
$data = mysqli_fetch_all($res , MYSQLI_ASSOC);

echo json_encode($data);













?>