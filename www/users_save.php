<?php
session_start();  
//if(!isset($_SESSION["logged_root"]))
//	header( "Location: index.php" );
//else{
	include 'db_params.php';
	if(isset($_POST['name'],$_POST['pass'])){
		$name=$_POST['name'];
		$phone=$_POST['pass'];
		$update=$_POST['update'];
		//$hash= password_hash($pass, PASSWORD_DEFAULT); //hashvam parola na usera
		$time=0;
		$atp=0;
		if($update==0){
			$conn = new mysqli($host, $username, $password, $dbname); //change to check phone number
			$stmt = $conn->prepare("SELECT name FROM users WHERE name=(?)"); //proverqvam za veche sushtestvuvash potrebitel
			$stmt->bind_param("s", $name);
			$stmt->execute();
			$stmt->bind_result($col1);
			$stmt->fetch();
			if($name==$col1)
				echo "Има такъв потребител!";
			else{
				$stmt = $conn->prepare("INSERT INTO users (name,phone) VALUES (?,?)"); //zapisvam nov potrebitel
				$stmt->bind_param("ss", $name,$phone);
				$stmt->execute();
				$stmt->close();
				$conn->close();
				echo "Потребителят е регистриран!";
			}
		}
		else if($update==1){
			$conn = new mysqli($host, $username, $password, $dbname);
			$stmt = $conn->prepare("UPDATE users SET hash=(?) WHERE name=(?)"); //promenam parolata mu
			$stmt->bind_param("ss", $hash,$name);
			$stmt->execute();
			$conn->close();
			echo "Паролата е променена!";
		}
	}
//}
?>