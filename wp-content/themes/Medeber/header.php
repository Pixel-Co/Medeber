<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <?php  wp_head() ?>

</head>
<body >

<!--Navigation start-->
<nav class="navbar navbar-expand-lg navbar-light mb-4" style="background-color:<?= get_theme_mod('header_background'); ?>!important">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

      

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php wp_nav_menu(['theme_location'=>'header', 
                            'container_class'=>'main-nav', 
                            'menu_class'=> 'navbar-nav mr-auto'])?>
        

            
    </div>
</nav>
<!--Navigation end-->





    <div class="container">