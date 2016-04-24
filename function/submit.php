<?php
$dno=$_GET['dno'];

require("./db.class.php");
$a=new db();
	$sql="select * from papers where dno=$dno;";
	//echo $sql;
	if($result=$a->querysql($sql))
		{
		//	print_r($result);
			if(mysqli_num_rows($result)==0)
				echo 1;
			else
				echo 0;
			
		}

?>