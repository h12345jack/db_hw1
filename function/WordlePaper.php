<?php
require "./Wordlepapers.class.php";
$id = $_GET['id'];
$a = new papersdeal($id);
$b = $a->wordlepapers1();
$result = $a->wordlepapers2($b);
header("Location:../pages/glwx.php");
$a = null;
?>