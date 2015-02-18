<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VVintage - sklep z odzieżą używaną</title>

    <!-- Bootstrap -->
    <link href="/stronka/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	
  	
  	
  </br>
     <center> <a href="/stronka/site/index"><img src="/stronka/images/logo.jpg"  ></a></center></br>
-
   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>

<form id="id" name="id" method="post" action="<?php echo base_url();?>site/aktualizuj">
<!--<label for="id">ID</label>	
 <input name="id" type="number" disabled="disabled" id="id" value="<?php echo $rows['id']; ?>" />
<input type="hidden" name="id" id="id" value="<?php echo $rows['id']; ?>" /><br/> -->
<label for="title">Tytul</label>	
<input type="text" name="title" id="title" value="<?php echo $rows['title']; ?>" /><br/>
<label for="contents">Tresc</label>	
<input type="text" name="contents" id="contents" value="<?php echo $rows['contents']; ?>" /><br/>
	<input type="submit"  value="Edytuj" name="edit"/>
</form>

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
<fieldset>

<legend>ZAPISZ SIĘ DO NEWSLETTERA</legend>


<input type="text" class="text placeholder" name="email" placeholder="WPISZ SWÓJ E-MAIL"><input type="submit" class="btn btnNewsletter" value="Zatwierdź">


</fieldset>
</div>
<div class="col-md-4">
  
<p class="navbar-text pull-right">M.S. IS gr.6 Copyright 2014 All Rights Reserved.</p>

  </div>

  </div>

  <div class="container visible-xs">

</div>
  </div>

</footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/stronka/assets/js/bootstrap.min.js"></script>
  </body>
  </html>
</html>