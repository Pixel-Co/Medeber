<?php 
    get_header();
    wp_head();

?>

<body class="img-accueil">

    <div class="navbar-accueil-langue">

        <div class="choix-langue-lg">
                <div class="choix-langue">
                    <a class="a-link-accueil" href="<?= home_url('/a-propos'); ?>">
                        <p>FR</p>
                    </a>
                </div>

                <div class="choix-langue">
                    <a class="a-link-accueil" href="<?= home_url('/a-propos'); ?>">
                        <p>NL</p>
                    </a>
                </div>

                <div class="choix-langue">
                    <a class="a-link-accueil" href="<?= home_url('/a-propos'); ?>">
                        <p>EN</p>
                    </a>
                </div>
        </div>

    </div>


