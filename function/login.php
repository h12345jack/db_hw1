<?php
$username = $_POST['username'];
$password = md5($_POST['password']);
$yzm = $_POST['authnum_session'];
session_start();
$yzm2 = $_SESSION['authnum_session'];
if ($yzm != $_SESSION['authnum_session']) {
	echo "验证码错误";
} else {
	require "./db.class.php";
	$a = new db();
	$sql = "select * from users where username='$username' and password='$password';";
	if ($result = $a->querysql($sql)) {
		if (mysqli_num_rows($result) == 0) {
			echo "用户或者密码错误";
		} else {
			$_SESSION['user_id'] = mysqli_fetch_array($result)[0];
			//tiao'zhuan
			echo 1;
		}
	}
}
?>