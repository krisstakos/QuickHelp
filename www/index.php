<?php
session_start();
if(!isset($_SESSION["logged"])){
	header('Location: us_login.php');
	die();
}
else
echo <<<EOT
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="css/ui_colors.css" />
	<link rel="stylesheet" href="icon_pack/foundation-icons.css" />
</head>
<body>
<div class="main-container">
	<div class="row">
  			<textarea rows="2" cols="auto" placeholder="Информация за сигнала"></textarea>
  	</div>
	<div class="row">
  		<div class="small-5 columns">
  			<div class="panel" >
  				<img src="fire.png" alt="fire" id = "fire" ontouchstart="touchDown(this.id);">
  			</div>
		</div>
  		<div class="small-5 columns">
  			<div class="panel" >
  				<img src="water.png" alt="Water" id="water" ontouchstart="touchDown(this.id);">
  			</div>
  		</div>
  	</div>
	<div class="row">
  		<div class="small-5 columns">
  			<div class="panel"  >
  				<img src="lin.png" alt="Ambulance" id="ambulance" ontouchstart="touchDown(this.id);">
  			</div>
		</div>
  		<div class="small-5 columns">
  			<div class="panel" >
  			<img src="Car.png" alt="Car" id="car" ontouchstart="touchDown(this.id);">
  			</div>
  		</div>
  	</div>
  	<div class="row">
  		<div class="small-5 columns">
  			<div class="panel" >
  				<img src="alps.png" alt="Alps" id="alps" ontouchstart="touchDown(this.id);">
  			</div>
		</div>
  		<div class="small-5 columns">
  			<div class="panel" >
  			<img src="police.png" alt="Police" id="police" ontouchstart="touchDown(this.id);">
  			</div>
  		</div>
  	</div>
</div>


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Начин на употреба</h2>
  <ul>
  <li>При двойно докосване на някоя плочка се изпраща сигнал до съответният оператор.</li>
  <li>При задържане на докосването се изобразява информация за съответната плочка и нейното предназначение.</li>
  <li>Приложението съдържа незадължително поле за допълнително описание на ситуацията.</li>
  </ul>
  <p>* Със затварянето на този диалогов прозорец Вие носите наказателна отговорност при прекомерна употреба на системата! </p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<!--All mdesriptions-->
<div id="fireModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При пожар</h2>
  <p>Пожарът е неконтролирано горене, което заплашва човешкия живот и здраве, материални ценности или природната среда. Пожарът може да бъде инцидентен или умишлено предизвикан (палеж) с цел саботаж или в резултат на пиромания, или е причинен нежелано. </p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="waterModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При наводнение</h2>
  <p>Наводнение се нарича временното заливане на дадена земна местност или територия с огромно количество вода вследствие на повишаването на нивото на река, езеро, море или океан.</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="ambulanceModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При животозастрашаваща ситуация</h2>
  <p>Първа помощ е прилагането на мерки за непосредственото поддържане на живота на хора с травми и заболявания до момента, в който им бъде оказана професионална медицинска помощ. </p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="carModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При случай на ПТП</h2>
  <p>Пътнотранспортното произшествие е събитие, възникнало в процеса на движението на пътно превозно средство и предизвикало нараняване или смърт на хора и/или нанесло повреда на пътно превозно средство, път, пътно съоръжение, товар или други материални щети. </p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="alpsModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При нужда от планинска спасителна служба</h2>
  <p>Оказва помощ на пострадалите в планините.
    Развива профилактична и контролна дейност за предотвратяване на нещастията в планините.
    Провежда търсене на изгубени и транспортиране на пострадали в планините.
    Извършва обучението и квалификацията на планинските спасители.
    Организира и поддържа експлоатацията на спасителните постове.
    Съдейства при опазването на околната среда.
    Провежда търсене и транспортиране на трупове в трудно достъпни планински терени по искане на компетентни органи.</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="policeModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">При нужда от МВР</h2>
  <p>Грижи се за защитата на вътрешната и на националната сигурност, за борбата с престъпността, опазването на обществения ред и други.</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<div id="signalModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Статус на сигнала</h2>
  <div id="output"></div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

 <div class="navbar" id="myNavbar">
  <a href="#about">Сигнализирай</a>
</div> 



<script>

window.onload= function(){
		$('#myModal').foundation('reveal', 'open');
	}
function findMe(){
  $('#signalModal').foundation('reveal', 'open');
  var output = document.getElementById("output");
  if (!navigator.geolocation){
    output.innerHTML = "<p>Не се поддържа геолокация!</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;
    var accu = position.coords.accuracy;
	output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°'+'accu'+accu + '</p>';
    var img = new Image();
    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=18&size=300x300\&markers=color:red%7Clabel:S%7C"+latitude+","+longitude;

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "<p>Не може да се локира</p>";
  };
  output.innerHTML = "<p>Локиране…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}



  var touchTimer;
  function touchDown(id) {
 
  	//findMe(); 
    touchUp();
    touchTimer = window.setTimeout(function(){
    	execTouchDown(id);
    },1000);
  }

  function touchUp() {
      if (touchTimer){ 

      	window.clearTimeout(touchTimer)};
  }

  function execTouchDown(id) { 
     $("#"+id+"Modal").foundation('reveal', 'open');
  }
  document.body.addEventListener("touchend", touchUp);
  
</script>
<script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
EOT;
?>