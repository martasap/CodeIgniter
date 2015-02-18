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
  	 
  	<div id="container"><center>
<?php if(!isset($post)){ ?>
	<p>This page was accessed incorrectly.</p>
	
<?php } else { ?>
	
	<h2><?=$post['title']?></h2>
	<?=$post['contents']?>
	<hr/>
	
	<h2>Komentarze</h2>
	<?php if(count($comments)>0){ ?> 
		<?php foreach ($comments as $row){ ?>
			<p><strong><?=$row['email']?></strong> powiedział(a) <?=date('m/d/Y H:i A', strtotime($row['date_added']))?><br/><?=$row['comment']?></p>
			<hr/>
			<?php } ?>
			<?php } else{ ?> 
			<p>Nie ma jeszcze komentarzy.</	p>
	<?php		} ?>
	<?php echo form_open(base_url(). 'comments/add_commentp/' .$post['id']); ?>
	<?php
	$data_form = array('name' => 'comment' );
	echo form_textarea($data_form);
	?>
	<p><?php echo form_submit('', 'Dodaj komentarz'); ?></p>
	<?php } ?>
</center></div> 

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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/stronka/assets/js/bootstrap.min.js"></script>
  </body>
</html>