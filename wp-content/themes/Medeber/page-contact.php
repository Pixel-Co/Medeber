<Body class="m-contact">

<div class="img-contact"></div>
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






<img class="map" src="/wp-content/themes/Medeber/img/contact-map.png" alt="">

    <div class="content-contact">
        <?php 
            the_content();
        ?>

    </div>







<?php get_footer() ?>
