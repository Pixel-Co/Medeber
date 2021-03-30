<Body class="m-workshops">

<div class="img-workshops"></div>
    <div class="logo-img">
        <a href=" <?= home_url('/'); ?> ">
            <img class="logo" src="/wp-content/themes/Medeber/img/logo.png">
        </a>
    </div>

     <!-- Choix des langues -->
     <div class="choix-langue-onpage">
                <div class="choix-langue-page">
                    <a class="a-link-page" href="<?= home_url('/a-propos'); ?>">
                        <p>FR</p>
                    </a>
                </div>

                <div class="choix-langue-page">
                    <a class="a-link-page" href="#">
                        <p>NL</p>
                    </a>
                </div>

                <div class="choix-langue-page">
                    <a class="a-link-page" href="#">
                        <p>EN</p>
                    </a>
                </div>
     </div>

<?php 
get_header();
?>

<!--Start sous-menu-->
    <nav class="sous-menu-1 " >

    <div class="sous-menu" id="navbarSupportedContent">
                <?php wp_nav_menu(['theme_location'=>'sous-menu-1',
                                    'container_class'=>false,
                                    'menu_class'=> 'navbar-nav mr-auto sous-menu-1',
                                    'link_class' => 'sous-menu-bruxrom-lulu'
                                ])?>
                </div>
    </nav>

<!--Stop sous-menu-->


<?php 
    the_content();
?>




<?php get_footer() ?>