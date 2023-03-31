<?php get_header(); ?>
<?php while (have_posts()) : the_post() ?>
    <!-- La partie photo en bg + title de hero header -->
    <div class="hero-header">
        <h1 class="hero-title"><?php the_title(); ?></h1>
    </div>

    <!-- ici je rajoute la partie filtres -->
    <div class="filters">
    
        <select name="categories" id="categories-select">
            <option value=""></option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
        </select>

        <select name="filters" id="filter-select">
            <option value=""></option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
        </select>

        <select name="photos" id="photo-select">
            <option value=""></option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
            <option value="cat">category 1</option>
        </select>
    </div>



    <!-- ici j'affiche toutes les photos en 2 colonnes  -->
    <section id="photos">
        <?php
        $allPhotos = new WP_Query([
            'post_type' => 'photo',
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => 12, // je determine la limite d'affichage ici. Pour afficher tout : -1
            'paged' => 1,
        ]);

        // var_dump($allPhotos);
        ?>

        <?php if ($allPhotos->have_posts()) : ?>
            <div class="photo-grid">
                <?php while ($allPhotos->have_posts()) : $allPhotos->the_post(); ?>
                    <div class="image-container">
                        <!-- Parcourir le tableau des images -->
                        <img src="<?php
                                    $pic = get_field('image');
                                    echo $pic['url'];
                                    ?>" alt="image de marriage">
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <button id="load-more">Load More</button>
    </section>
<?php endwhile ?>
<?php get_footer(); ?>