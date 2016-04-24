<?php
$title=$_POST['title'];
//echo $username1;
$author=$_POST['author'];

$dno=$_POST['dno'];
$content=$_POST['content'];
//echo $password1;
require("./db.class.php");
$a=new db();
$sql="insert into papers(dno,title,author,full_text)values($dno,'$title','$author','$content');";
echo $sql;
$a->querysql($sql);
$a=null;
header("location:../pages/glwx.php");
?>