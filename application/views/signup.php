<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<title>Zarejestruj</title>
    <link href="/stronka/assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<style>#center {
   width: 300px;
   margin-left: -150px; /* połowa szerokości */
   position: absolute;
   left: 50%;
}
}</style>
	 </br>
     <center><a href="/stronka/site/index"> <img src="/stronka/images/logo.jpg"  ></a></center></br>

   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>
	<div id="container"></div>
	<center><h1>Zarejestruj się</h1></center>
<div class="col-xs-2"  id="center">
	<?= $this->form_builder->open_form(array('action' => 'site/signup_validation')); ?>
	<?php echo validation_errors(); ?>
<?php
echo $this->form_builder->build_form_horizontal(
        array(
 array(
        'id' => 'email',
        'type' => 'email',
        'autocomplete' =>  ' email',
        'placeholder' => 'Wpisz e-mail',
        'label' => 'Email',
        
        'value' => $this->input->post('email')
    ),
     array(
        'id' => 'password',
        'type' => 'password',
        'autocomplete' =>  ' Password',
        'placeholder' => 'Wpisz hasło',
        'label' => 'Hasło',
        
        'value' => $this->input->post('password')
    ),
     array(
        'id' => 'cpassword',
        'type' => 'password',
        'autocomplete' =>  ' Password',
        'placeholder' => 'Powtórz hasło',
        'label' => 'Hasło',
        
        'value' => $this->input->post('cpassword')
    ),
    array(
        'id' => 'Zarejestruj',
        'type' => 'submit'
    )
        ));
?>
	
	<?= $this->form_builder->close_form(); ?> </div></br></br></br></br></br></br></br></br></br></br></br>
	<center><a href='<?php echo base_url(). "site/signup"; ?>'>Zarejestruj się</a>
	<a href='<?php echo base_url(). "site/forgot"; ?>'>Zapomniałeś hasła?</a></center></br></br></br></br>
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
