<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<title>My Blog</title>
</head>
<body>
		 </br>
     <center><a href="/stronka/site/index"> <img src="/stronka/images/logo.jpg"  ></a></center></br>

   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>
	<div id="container">
	<center><h1>Użytkownicy</h1></center>
	<?php
	echo "<pre>";
	//echo $this->session->all_userdata();
	echo "</pre>";
	?>
	<a href='<?php echo base_url()."site/logout" ?>'>Wyloguj</a>
	</div>
	<footer class="bottom">

<div class="container hidden-xs">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-1">
<a href="http://facebook.com/tetristologo" ><img src="http://www.mrmrssandman.pl/wp-content/themes/sandman/images/icn-facebook.png"></a>
<a href="http://twitter.com/tetristologo" ><img src="http://inno101.com/wp-content/themes/Inno101/images/icn-twitter.png"></a>
</div>
<div class="col-md-2"></div>
<div class="col-md-4">
<center><a href="/stronka/site/login" class="btn btn-default btn-lg active" role="button">Zaloguj się</a>
<a href="/stronka/site/signup" class="btn btn-default btn-lg active" role="button">Zarejestruj się</a></center>
</div>
<div class="col-md-4">
  
<p class="navbar-text pull-right">M.S. IS gr.6 Copyright 2014 All Rights Reserved.</p>

  </div>

  </div>

  <div class="container visible-xs">

</div>
  </div>

</footer>
</body>
</html>
