<?php
session_start();

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
		<h2>Регистриране на потребител:</h2>
		<input type="text" id="name" placeholder="Име" />
		<input type="text" pattern="[0-9]*" id="pass" placeholder="Телефон"/>
		<div class="row">
			<button id ="sign_up" class="radius tiny button">Вход</button>
		</div>
		<div id="status"></div>
</div>
</div>
</div>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/reg.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
EOT;
?>