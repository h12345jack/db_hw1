<?php
$username1=$_POST['username'];
//echo $username1;
$password1=$_POST['password'];

$password1=md5($password1);
//echo $password1;
require("./db.class.php");
$a=new db();
$sql="insert into users(username,password)values('$username1','$password1');";
$a->querysql($sql);
$a=null;
header("location:../pages/yhgl.php");
?>