<Body class="m">

<div class="img-about"></div>
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

        
            <aside class="col-md-3 blog-sidebar ">
                <?php dynamic_sidebar('gallery'); ?>
            </aside><!-- /.blog-sidebar -->


    <div class="content">
        <?php 
            the_content();
        ?>
    </div>

      <a href="https://www.facebook.com/medeberteatro/" target="_blank">      
        <button type="button" class="btn btn-primary btn-mobile">Suivez notre actu fecebook</button>
      </a>   


<?php get_footer() ?>