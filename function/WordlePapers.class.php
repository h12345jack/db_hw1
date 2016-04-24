<?php
function key_compare_func($a, $b) {
	return 0;
}
class papersdeal {
	public $username = "phpcourse1";
	public $password = "phpcourse";
	public $servername = "localhost";
	public $dbname = "cwgdb";
	public $conn;
	public $pid;
	public function __construct($i) {
		//echo "hellw";
		$this->pid = $i;
		if (!$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname)) {
			echo "error";
		}
	}
	function __destruct() {
		mysqli_close($this->conn);
	}
	function wordlepapers1() {
//读取文章
		$sql = "select full_text from papers where dno='$this->pid'";
		if (!$result = mysqli_query($this->conn, $sql)) {
			// print_r($result)
		}
		while ($row = mysqli_fetch_array($result)) {
			$full_text = $row[0];
		}
		//echo $full_text;
		return $full_text;
	}

//去掉非空格的字符
	//使用停用词表
	//获得切词后的数组
	function readstop_word() {
		$sql = "select * from stop_word";
		if (!$result = mysqli_query($this->conn, $sql)) {
			// print_r($result)
		}
		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$stop_word[$row[0]] = $i++;
		}
		return $stop_word;
	}
	function wordlejs($jsc) {
		$jsc = strtolower($jsc); //转小写
		$jsc = preg_replace("/[-(),.;\"《》\']/", " ", $jsc); //使用正则表达式替换符号
		$words = str_word_count($jsc, 1); //切词
		$all = count($words); //单词总数
		//print_r($all);
		$num_words = array_count_values($words); //计数不重复的单词数目
		$stop_word = $this->readstop_word();
		//	print_r($stop_word);
		$result_word = array_udiff_assoc($num_words, $stop_word, "key_compare_func");
		//	print_r($result_word);获得检索出与停用词表的补集
		//
		return $result_word;

	}
	function wordlepapers2($full_text) {
		$full_text = strtolower($full_text); //转为小写
		$full_text1 = preg_replace("/[-(),.;\"《》\']/", " ", $full_text); //使用正则表达式
		$words = str_word_count($full_text1, 1); //转为
		$all = count($words); //单词总数
		//print_r($all);
		$num_words = array_count_values($words); //不重复的单词数目
		//print_r($num_words);
		//echo count($num_words);
		//echo "<br/>";
		//$all=count($num_words);
		$stop_word = $this->readstop_word();
		//print_r($stop_word);
		$result_word = array_udiff_assoc($num_words, $stop_word, "key_compare_func");
		//echo "使用后" . "<br/>";
		//echo count($result_word);
		//print_r($result_word);
		mysqli_query($this->conn, 'Start TRANSACTION') or exit(mysql_error($this->conn));
		$is_wrong = 1;
		while ($i = key($result_word)) {
			/*这里有两种想法，可以加载停用词表，两个数组进行差集操作
			也可以将每一个单词都读入到词表中进行判断，执行更多地SQL语句
			这里使用了方法1；
			 */
			$num = current($result_word);
			$sql = "insert into words(word,dno,number)values('$i',$this->pid,$num)";
			if (!mysqli_query($this->conn, $sql)) {
				echo mysqli_error($this->conn) . "<br>";
				mysqli_query($this->conn, 'ROLLBACK'); //判断当执行失败时回滚

			}
			next($result_word);
		};
		mysqli_query($this->conn, 'COMMIT') or exit(mysqli_error($this->conn)); //执行事务
		$sql = "update papers set is_wordle=$is_wrong where dno=$this->pid";
		//echo $sql;
		if (!mysqli_query($this->conn, $sql)) {
			// print_r($result)
			return 0;
		}
		return 1;
	}
}
//对数组进行停用词表，查询该词是否出现，如果出现，将该词从数组中去掉，否则保留
//插入到数据库中

?>