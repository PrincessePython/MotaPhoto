<!-- 
    Fichier qui détermine la mise en forme des posts individuels.
    Template dédiée à l’affichage d’un seul Post.
-->

<?php

get_header();
global $wp_query;
?>



<div>
    <!-- Parcourir le tableau des images -->
    <img src="<?php
                $pic = get_field('image');
                echo $pic['url'];
                ?>" alt="image de marriage">
</div>
<div class="date">
    <span>
        <?php
            echo get_the_date('Y');
        ?>
    </span>
</div>

<?php get_footer(); ?>
