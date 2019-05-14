<?php
include"koneksi.php";
$triger=$_POST['triger'];

if($triger == 'del'){
$id=$_POST['id'];
$mysqli->query("delete from user where user_id='$id' ");
}

if($triger == 'tambah'){
$res=$mysqli->query("insert into user (user_id) values('')");
if($res){
echo json_encode(array());
}
}

if($triger == 'daftar'){
$random=md5($_POST['pass']);
$res=$mysqli->query("insert into user (user_email,user_pass) values ('$_POST[email]','$random')");
if($res){
echo json_encode(array());
}
}

if($triger == 'edit'){
$random=md5($_POST['pass']);
$id=$_POST['id'];
if(empty($_POST['pass'])){
$res=$mysqli->query("update user set user_email='$_POST[email]' where user_id='$id' ");
}else{
$res=$mysqli->query("update user set user_email='$_POST[email]',user_pass='$random' where user_id='$id' ");
}
if($res){
echo json_encode(array());
}
}

if($triger == 'login'){
$pass=md5 ($_POST['pass']);
$login=$mysqli->query("select * from user where user_email ='$_POST[email]' AND user_pass='$pass' ");
$r = $login->fetch_array(MYSQLI_ASSOC);
if ($login->num_rows > 0){
echo json_encode(array());
session_start();
$_SESSION['email']=$r['user_email'];
}else{

}
}
?>