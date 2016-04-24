<?php
$username = "phpcourse1";
$password = "phpcourse";
$servename = "localhost";
$dbname = "cwgdb";
$stop_word_number; //停用词表
$text_number; //文献数
$user_number; //用户数
$text_deal_number; //处理后文献数
if (!$conn = mysqli_connect($servename, $username, $password, $dbname)) {
	echo "error";
}
$sql = "select count(*) from stop_word;";
if (!$result = mysqli_query($conn, $sql)) {
	// print_r($result);
}
while ($row = mysqli_fetch_array($result)) {
	$stop_word_number = $row[0];
	# code...
}
$sql = "select count(*) from papers;";
if (!$result = mysqli_query($conn, $sql)) {

}
while ($row = mysqli_fetch_array($result)) {
	$text_number = $row[0];
	# code...
}

$sql = "select count(*) from users;";
if (!$result = mysqli_query($conn, $sql)) {

}
while ($row = mysqli_fetch_array($result)) {
	$user_number = $row[0];
	# code...
}
$sql = "select count(*) from papers where is_wordle<>0;";
if (!$result = mysqli_query($conn, $sql)) {

}
while ($row = mysqli_fetch_array($result)) {
	$text_deal_number = $row[0];
	# code...
}
$sql = "select * from papers;";
if (!$tables = mysqli_query($conn, $sql)) {
}
mysqli_close($conn);
?>