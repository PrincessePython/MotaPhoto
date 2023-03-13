<!-- 
    Fichier qui détermine la mise en forme des posts individuels.
    Template dédiée à l’affichage d’un seul Post.
-->

<?php get_header(); ?>
<div class="main single">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <p class="post-info">
                    Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
                </p>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <!-- permet ajout des commentaires -->
                <div class="post-comments">
                    <?php comments_template(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>