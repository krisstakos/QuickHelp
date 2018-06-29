<?php
session_start();
if(isset($_SESSION["logged"])){
	header('Location: index.php');
	die();
}
else
echo <<<EOT
<html>
<head>
	<title>TEst</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/foundation.css" />
	<style>
	#login{
		text-align:center;
		width:80%;
		margin:0 auto;
	}
	html { 
	overflow-y: hidden; 
	}
	</style>
</head>
<body>
<div class="row">
	<div class="small-12 columns">
		<div id="login">
			<h2>Quick Help</h2>
			<input type="text" id="name" placeholder="Име" />
			<input type="tel" pattern="[0-9\/]*" id="phone" placeholder="Телефон" />
			<button id="send" class="radius tiny button" >Влез</button>
			<div id="status"></div>
		</div>
	</div>
</div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/login.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
EOT;
?>