<?php get_header(); ?>
<div class="main">
    <?php if (have_posts()) : ?>
        <!-- parcourir l'ensamble des articles -->
        <?php while (have_posts()) : the_post(); ?>
        <!-- display the content: https://developer.wordpress.org/themes/basics/the-loop/ -->
            <div class="welcome-page">
                <h1 class="welcome-page-title"><?php the_title(); ?></h1>
                <div class="welcome-page-content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
