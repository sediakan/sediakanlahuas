<?php
include"../koneksi.php";
$test=$mysqli->query("select * from user");
$arr =array();
while($r=$test->fetch_assoc()){
		$temp = array(
		"id" => $r['user_id'],
		"name" => $r['user_email'],
		"price" => $r['user_pass'],
		"edit" => "<a href=?id=$r[user_id]&#popup class='btn btn-success ed'>Edit</a> <a id=$r[user_id] triger=del class='btn btn-danger del'>Delete</a>" );
		
		array_push($arr, $temp);
}
$data = json_encode($arr);
echo"$data";
?>