<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VVintage - sklep z odzieżą używaną</title>

    <!-- Bootstrap -->
    <link href="/stronka/assets/css/bootstrap.min.css" rel="stylesheet">
    	
<link href="/stronka/assets/css/jquery.ui.css" rel="stylesheet" type="text/css" />
 


	<script type="text/javascript" src="/stronka/assets/js/jquery-1.4.4.min.js"></script>
	<script src="/stronka/assets/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="/stronka/assets/js/jquery.js"></script>
<script type="text/javascript" src="/stronka/assets/js/jquery.ui.js"></script>
    <script src="/stronka/assets/js/jquery-2.1.1.min.js"></script>
    	<script src="/stronka/assets/js/jquery.dataTables.js"></script>
    	<script src="/stronka/assets/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

  </head>
  <body>
  </br>
     <div align="center"> <a href="/stronka/site/index"><img src="/stronka/images/logo.jpg"  ></a></div></br>

   <center> <a href="/stronka/site/aktualnosci" class="btn btn-default btn-lg active" role="button">Aktualności</a>
<a href="/stronka/site/promocje" class="btn btn-default btn-lg active" role="button" >Promocje</a>
<a href="/stronka/site/filie" class="btn btn-default btn-lg active" role="button">Filie</a>
<a href="/stronka/site/kontakt" class="btn btn-default btn-lg active" role="button">Kontakt</a></center></br>
<script>
$(document).ready(function() {
     var item1 = '#category-suggestions';
     var item2 = '#category';
     var item3 = '#category-autoSuggestionsList';
 
     $(item1).hide();
 
     function lookup(fieldSuggestions, fieldSuggestionsList, inputString) {
          if(inputString.length == 0) {
               $(fieldSuggestions).hide();
          } else {
               $.post("http://localhost/stronka/site/autocomplete1/", 
               {queryString: ""+inputString+""}, 
               function(data){
                    if(data.length >0) {
                         $(fieldSuggestions).show();
                         $(fieldSuggestionsList).html(data);
                    }
	       });
          }
     }
 
     function fill(fieldId, fieldSuggestions, thisValue) {
          $(fieldId).val(thisValue);
          setTimeout("$('" + fieldSuggestions + "').hide();", 200);
     }
 
     $(item2).keyup(function() {
          lookup(item1, item3, $(item2).val());
     });
 
     $(item3 + " li").live('click', function() { 
          fill(item2, item1, $(this).attr('title'));		 
     });
});</script>
 
<div class="control-group">
	<center>
     <label class="control-label">Wyszukiwarka</label>
     <div class="controls">
     <?php
     $params = array(
               'id'            => 'category',
               'title'          => 'title',
               'placeholder'   => 'Szukaj promocji',
               'class'         => 'input-xxlarge',
               'autocomplete'  => 'off'
     );
     echo form_input($params);
     ?>
     </center>
     </div>
     <div id="category-suggestions">
          <div class="suggestions" id="category-autoSuggestionsList">    
 
          </div>
     </div>
      
</div>
 <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <center>
            	
<?php 
foreach ($country as $r){
	
echo '<h1>' . $r['title']  . '</h1>';
	echo '<p class="lead">';
             echo     '  by <a href="mailto:tetristologo@gmail.com">'.$r['author']  .'</a>';
             echo   '</p>';
		echo	 '<hr>';

               
            echo    '<p><span class="glyphicon glyphicon-time"></span> Posted on ' .$r['data']  .'</p>';
			

                     echo '    <hr>';
         ?>  <p><?=substr(strip_tags($r['contents']),0,200).".."?></p>
<p><a href="<?=base_url()?>site/promo/<?=$r['id'] ?>">Czytaj więcej</a></p>

<?php
//echo '    <hr/>';
//echo '<div>' . $r->contents . '</div>';


}?> 
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