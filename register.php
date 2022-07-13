<?php
	session_start();

	//$_POST使用者名稱和密碼
	$username = $_POST['username'];
	$password = $_POST['password'];
	//連線mysql
	$con = mysqli_connect('localhost','a970638','Jack970638','user');
	//驗證mysql連線是否成功
	if(mysqli_errno($con)){
   
       
		echo "連線mysql失敗：".mysqli_error($con);
		exit;
	}
	//sql查詢語句
	$sql = "select id from userdata where username='$username' and password='$password'";
	//執行
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result); // 函式返回結果集中行的數量
	if($num){
		echo "<script>alert('登入成功');</script>";
		echo "<script>window.location.href = 'home.html'</script>";
		}

	else{
		echo "<script>alert('登入失敗，請重新輸入帳密');</script>";
		echo "<script>window.location.href = 'login.php'</script>";
		}
	
	$row = mysqli_fetch_assoc($result);
	$_SESSION['userid'] = $row['id']; // session
	
	mysqli_close($con);
?>