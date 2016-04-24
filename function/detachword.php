<?php
require "./db.class.php";
$id = $_GET['id'];
$db = new db();
$sql = "update papers set is_wordle=0 where dno=$id";
$db->querysql($sql);
echo $sql;
$sql = "delete from words where dno=$id";
$db->querysql($sql);
header("Location:../pages/glwx.php");
$db = null;
?>