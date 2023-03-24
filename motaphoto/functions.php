<?php

//====================== Ajouter la prise en charge des images mises en avant =========================== //
add_theme_support('post-thumbnails');

//====================== Ajouter automatiquement le titre du site dans l'en-tête du site ================ //
add_theme_support('title-tag');

//=======================  Ajouter le CSS  ======================================= //
function my_styles()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css',);
}
add_action('wp_enqueue_scripts', 'my_styles');


//====================== Ajouter le JS  =========================================== //
function my_scripts()
{
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), false, true);
}
add_action('wp_footer', 'my_scripts');

//========================   Plusieurs menus à rajouter via Admin Panel ============================== //
function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
            'footer-menu' => __('Menu Footer'),
        )
    );
}
add_action('init', 'register_my_menus');
