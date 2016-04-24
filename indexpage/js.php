<?php
function jsc() {
	$out = $_POST['jsc'] . "的";
	$op = $_POST['op'];
	if ($op == 2) {
		$out .= "作者检索";
	} else if ($op == 3) {
		$out .= "标题检索";
	} else {
		$out .= "全文检索";
	}

	$out .= "结果如下";
	return $out;
}
function resultit() {
	$jsc = $_POST['jsc'];
	$op = $_POST['op'];
	//echo $op;
	if ($op == 2) //作者检索
	{
		//	echo "here";
		require '../function/db.class.php';
		$sql = "select * from papers where author like '%$jsc%'";
		$db = new db();
		$result = $db->querysql($sql);
		$out = "";
		while ($row = mysqli_fetch_array($result)) {
			echo <<< END
		  <div class="row">
                <div class="panel panel-success col-lg-8 title1" >
                <div class="panel-heading text-center"><strong></strong>$row[1]</div>
                    <div class="panel-body">
                    	<h3><strong>Author:</strong>$row[2]</h3>
                        $row[3]
                    </div>
                </div>
            </div>
END;

		}

	} else if ($op == 3) //题目检索
	{
		//	echo "here";
		require '../function/db.class.php';
		$sql = "select * from papers where title like '%$jsc%'";
		$db = new db();
		$result = $db->querysql($sql);
		$out = "";
		while ($row = mysqli_fetch_array($result)) {
			echo <<< END
		  <div class="row">
                <div class="panel panel-success col-lg-8 title1">
                <div class="panel-heading text-center"><strong></strong>$row[1]</div>
                    <div class="panel-body">
                    	<h3><strong>Author:</strong>$row[2]</h3>
                        $row[3]
                    </div>
                </div>
            </div>
END;
		}
	} else {

		require '../function/WordlePapers.class.php';
		require '../function/db.class.php';
		$a = new papersdeal(-1);
		//	echo $jsc;
		$b = $a->wordlejs($jsc); //变量b为切伺后的单词和品次数
		$db = new db();
		//print_r($b);
		$sql = "select count(distinct dno) from words;";
		$rs = $db->querysql($sql);

		if (mysqli_num_rows($rs) != 0) {
			while ($row = mysqli_fetch_array($rs)) {
				$N = $row[0];
			}
		}
		//echo "N:" . $N;
		$c = array(); //记录那些文献要算
		$c1 = array();
		while ($i = key($b)) {
			$sql = "select dno from words where word like '$i%'"; //查询每个单词有那些文献
			$rs = $db->querysql($sql);
			//		echo $sql . "<br/>";
			if (mysqli_num_rows($rs) != 0) {
				while ($row = mysqli_fetch_array($rs)) {
					//echo $row['dno'] . "<br/>";
					array_push($c, $row['dno']);

				}
			}
			$sql = "select count(distinct dno) from words where word like '$i%'"; //查询出现单词的文档
			$rs = $db->querysql($sql);
			//echo $sql . "<br/>";
			if (mysqli_num_rows($rs) != 0) {
				while ($row = mysqli_fetch_array($rs)) {
					//echo $row['dno'] . "<br/>";
					$c1[$i] = $row[0];
					//				echo $c1[$i];

				}
			}
			next($b);
		}
		$c = array_unique($c);
		//	print_r($c1);
		$d = array(); //每篇文献的
		while (current($c)) {
//每一篇文献的每一个词的tf-idf
			$d[current($c)] = array();
			reset($b); //每一个单词
			$all = 0;
			$now = current($c); //文献
			$tfidf = array();
			$tf2 = 1;
			$sql = "select sum(number) from words where dno=$now";
			$rs = $db->querysql($sql);
			if (mysqli_num_rows($rs) != 0) {
				while ($row = mysqli_fetch_array($rs)) {
					$tf2 = $row[0]; //总有多少词
				}
			}
			//print_r($c1);
			while ($i = key($b)) {
//每一个词计算
				$sql = "select sum(number) from words where word like '$i%' and dno=$now";
				$tf = 0;
				$rs = $db->querysql($sql);
				if (mysqli_num_rows($rs) != 0) {
					while ($row = mysqli_fetch_array($rs)) {
						$tf = $row[0]; //出现的次数
					}
				}
				$tf = $tf / $tf2;

				//echo "tf2 " . $tf2 . "<br/>";
				$n = $c1[$i];
				$idf = 0;
				if ($n != 0) {
					$idf = log($N / $n + 0.01);
				}

				$tmp = $tf * $idf;
				//	echo "文献" . $now . "de " . $i . "tf-idf为" . $tmp . "<br/>";
				$d[current($c)][$i] = $tmp;
				next($b);
			}
			next($c);
		}
		//echo "这是没有乘以的时候" . "<br/>";
		//print_r($d);
		$jsjg = array(); //检索结果
		while ($i = key($d)) {
			$all = 0;
			//print_r(current($d));
			$j = current($d);
			while ($k = key($j)) {
				$all += $b[$k] * current($j);
				next($j);
			}
			$jsjg[$i] = $all;
			next($d);
		}
		//echo "乘以后" . "<br/>";
		//	print_r($jsjg);
		//	echo "排序后" . "<br/>";
		arsort($jsjg);
		//print_r($jsjg);
		while ($i = key($jsjg)) {
			$tfidf = current($jsjg);
			$sql = "select * from papers where dno=$i";
			$db = new db();
			$result = $db->querysql($sql);
			while ($row = mysqli_fetch_array($result)) {
				$rss = $row[3];
				reset($b);
				while ($j1 = key($b)) {
					$rss = str_ireplace(array($j1), "<strong>$j1</strong>", $rss, $jj);
					next($b);
				}
				echo <<< END
			  <div class="row">
                <div class="panel panel-success col-lg-8 title1">
                <div class="panel-heading text-center"><strong>$row[1]</strong></div>
                    <div class="panel-body">
                    	<h3><strong>Author:</strong>$row[2]</h3>
                    	<h4><strong>TF*IDF:</strong>$tfidf</h4>
                    	<p>$rss</p>
                    </div>
                </div>
            </div>
END;
				next($jsjg);
			}

		}
	}

}
?>