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


//========================  Load more button ================================================= //
function load_more(){
    $paged = $_POST['paged'];
    $posts_per_page = 12;

    $allPhotos = new WP_Query([
        'post_type'=> 'photo',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged,
    ]);

    if ($allPhotos->have_posts()) {
        $displayedPosts = array(); // Initialize empty array
        while ($allPhotos->have_posts()) {
            $allPhotos->the_post();

            // Check if post has already been displayed
            if (in_array(get_the_ID(), $displayedPosts)) {
                continue; // Skip this post
            }

            $permalink = get_the_permalink();
            $pic = get_field('image');

            echo '<div class="img">';
            echo '<a href="' . $permalink . '">';
            echo '<img src="' . $pic['url'] . '" alt="image de marriage">';
            echo '</a>';
            echo '</div>';

            $displayedPosts[] = get_the_ID(); // Add post ID to array
        }
    } else {
        echo '';
    }

    wp_reset_postdata();
    exit;
}

add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');


//========================  Single page : suggested pics Load more button ================================================= //




//========================  Front page : filters ================================================= //
 function filtersHomePage(){
    //some code here and then ajax request

    // fonction has to display photos according to a category that is selected
    // 1. check if category || filter is selected. 
    // 2. make a demande from the bdd for those names / slugs ? 
    // 3. stock the result else where (in variable) to be used id js function
    // 4. JS: ajax request to load the content that was demanded 
 }

