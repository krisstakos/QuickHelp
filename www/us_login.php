<?php
session_start();  
if(isset($_POST['name']) && isset($_POST['phone'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	include 'db_params.php';
	login_check($name,$phone,$host,$username,$password,$dbname);
}
else
	header('Location: index_login.php');
function login_check($name,$phone,$host,$username,$password,$dbname){
	$msg1="";
	$msg2="";
	$url="";
	$conn = new mysqli($host, $username, $password, $dbname);
	if($stmt = $conn->prepare("SELECT name,phone FROM users WHERE name=(?) OR phone=(?)")){
		$stmt->bind_param("si", $name, $phone);
		$stmt->execute();
		$stmt->bind_result($col1,$col2);
		$stmt->fetch();
		$stmt->close();
		if ($col1 == $name && $col2 == $phone) {
				$stat=1;
				$_SESSION['logged']=true;
				$url="index.php";
			}
			else if($col1 != $name || $col2 != $phone){
				$stat=0;
				$msg1='Името или телефона са неправилни!';
		}
		$array=array( //slagom go v masiv
					'url' => $url,
					'msg1' => $msg1,
					'stat' => $stat
				);
				$return[]=$array;
		echo json_encode($return);
	}
}
?>