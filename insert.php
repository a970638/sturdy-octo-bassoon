<?php
// 連結資料庫
require_once 'connect.php';
?>
<?php
	session_start();
	//$_POST時間值
	$language = $_POST['language'];
	$pagenum = $_POST['pagenum'];
	$staytime = $_POST['staytime'];
	$rectime = $_POST['rectime'];
    $playtime = $_POST['playtime'];
	$timeid = $_SESSION['userid'];
	//連線mysql
	
	//sql插入語句
	$sql = "INSERT INTO `time` (`lang`, `page`, `stay`, `record`, `play`, `time_id`) VALUE ('$language', $pagenum, $staytime, $rectime, $playtime, $timeid)";
	//執行


	// 用mysqli_query方法執行(sql語法)將結果存在變數中
	$result = mysqli_query($link,$sql);

	mysqli_close($link); 
?>