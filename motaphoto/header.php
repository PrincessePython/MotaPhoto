<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- permets de définir la langue du document dans les réglages > général > langue du site -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Permet de définir 'encoage du site -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fite=no" />

    <?php wp_head(); ?> <!-- Fonction essentielle au bon fonctionnement de thème -->
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <a href="<?php echo home_url('/'); ?>"> <!-- Permet de revenir à l'accueil une fois logo est cliqué -->
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo"> <!-- Pour avoir adresse absolute (dit "complet") -->
        </a>
    </header>
