<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- permets de définir la langue du document dans les réglages > général > langue du site -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Permet de définir 'encoage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fite=no" />

    <!-- adding Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">

    <!-- Fonction essentielle au bon fonctionnement de thème -->
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="logo">
            <a href="<?php echo home_url('/'); ?>"> <!-- Permet de revenir à l'accueil une fois logo est cliqué -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"> <!-- Pour avoir adresse absolute (dit "complet") -->
            </a>
        </div>

        <!-- Rajout de menu via panel d'administration -->
        <div class="nav-links-container">
            <?php
            if (has_nav_menu('main-menu')) : ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'my-main-menu', // classe CSS pour customiser mon menu
                ));
                ?>
            <?php endif;
            ?>
            <ul id="rebel-ul">
                <li id="contact"><a href="#">Contact</a></li>
            </ul>

        </div>
    </header>