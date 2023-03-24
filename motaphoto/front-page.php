<?php get_header(); ?>
<?php while (have_posts()) : the_post() ?>
    <div class="hero-header">
        <!-- La partie photo (en div) + title de hero header -->
        <h1><?php the_title(); ?></h1>
    </div>

    <!-- ici je rajoute la partie ACF -->
    <div class="filters">
        <br>
        <br>
        <br>
        <p>here come some filters ACF</p>
        <br>
        <br>
        <br>
    </div>

    <!-- ici j'affiche toutes les photos en 2 colonnes -->
    <section id="photos">
        <?php
        $allPhotos = new WP_Query([
            'post_type' => 'photo',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => 12 // je tetermine la limite d'affichage ici. Pour afficher tout : -1
        ]);

        // var_dump($allPhotos);
        ?>
        
        <?php if ($allPhotos->have_posts()) : ?>
            <?php while ($allPhotos->have_posts()) : $allPhotos->the_post(); ?>

                <!-- Parcourir le tableau des images -->
                <div class="photo-grid">
                        <img src="<?php
                        $pic = get_field('image');
                        echo $pic['url'] ;
                        ?>" alt="image de marriage">
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
        <button id="load-more">Load More</button>
    </section>
    
    <?php endwhile ?>
    <?php get_footer(); ?>
    



    