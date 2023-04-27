<?php get_header(); ?>

<?php
$args = array(
    // Arguments for your query. 
    'post_type' => 'photo',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1,
);

// Custom query. 
$query = new WP_Query($args);
// var_dump($query);
?>
<!-- Check that we have query results.  -->
<?php if ($query->have_posts()) : ?>
    <div class="photo-grid">
        <?php
        while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $query->the_post();
            // Contents of the queried post results go here. 
            ?>
            <?php
            $image = get_field('image');
            if ($image) {
                echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '">';
            };
            ?>
        <?php endwhile; ?>
    </div>

<?php
endif;
// Restore original post data. 
wp_reset_postdata();
?>


<?php get_footer(); ?>