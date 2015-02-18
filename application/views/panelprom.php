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

   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>

<center><a href="/stronka/site/dodajprom" class="btn btn-default btn-lg active" role="button">Dodaj wpis</a></center>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <center>
<?php
$i=1;
foreach ($country as $r){
	?>
	<tr>
<td><?php  $i++ ;?></td>		
<td><?php echo '<h1>' . $r->title . '</h1>';?></td>
<td><?php echo '<div>' . $r->contents . '</div>';?></td>

<td><a href="<?php echo base_url('/site/edytujprom/' .$r->id)?>"onclick="return confirm('Czy na pewno chcesz edytować?')"> Edytuj </a> <a href="<?php echo base_url('/site/usunprom/' .$r->id)?>" onclick="return confirm('Czy na pewno chcesz usunąć?')"> Usuń</a></td>

</tr>

<?php
}
?>
</div></div></center>
<div align="center" style="margin-top:10px;">
 <?php
// $this->table->set_heading('title', 'contents');
// echo $this->table->generate($country);
// echo $this->table->generate($country);
 echo $this->pagination->create_links();
 ?>
</div>

<footer class="bottom">

<div class="container hidden-xs">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-1"></br>
<a href="http://facebook.com/tetristologo" ><img src="http://www.mrmrssandman.pl/wp-content/themes/sandman/images/icn-facebook.png"></a>
<a href="http://twitter.com/tetristologo" ><img src="http://inno101.com/wp-content/themes/Inno101/images/icn-twitter.png"></a>
</div>
<div class="col-md-2"></div>
<div class="col-md-4">

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