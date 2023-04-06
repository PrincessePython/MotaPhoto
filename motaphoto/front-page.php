<?php get_header();
// global $wp_query;
?>
<?php while (have_posts()) : the_post() ?>
    <!-- La partie photo en bg + title de hero header -->
    <div class="hero-header">
        <h1 class="hero-title"><?php the_title(); ?></h1>
    </div>



<!-- Getting the taxonomies out of DB :) -->
<?php
$terms = get_the_terms( get_the_ID(), 'category' );
var_dump($terms);

?>






    <!-- ici je rajoute la partie filtres -->
    <section class="filters">
        <div class="filters-1-2">
        <?php
            $categories = new WP_Query([
                'post_type' => 'photo',
                'orderby' => 'date',
            ]);
            // var_dump($categories);
            ?>

            <div class="filter-cat">
                <label for="category" class="letters-transform">Catégories</label>
                <select name="categories" id="categories-select">
                    <option value="">TEST</option>
                </select>
            </div>


            <div class="filter-formats">
                <label for="formats" class="letters-transform">Formats</label>
                <select name="format" id="filter-select">
                    <option value=""></option>
                    <option value="cat">format</option>
                </select>
            </div>

        </div>

        <div class="filter-3">
            <label for="sort-by" class="letters-transform">Trier par</label>
            <select name="sort" id="sort-select">
                <option value=""></option>
                <option value="cat">category 1</option>
                <option value="cat">category 1</option>
                <option value="cat">category 1</option>
            </select>

        </div>

    </section>



    <!-- ici j'affiche toutes les photos en 2 colonnes  -->
    <section class="image-container">
        <div id="photos">
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
                        <div class="img">
                            <!-- Parcourir le tableau des images -->
                            <?php $permalink = get_the_permalink(); ?>
                            <a href="<?php echo ($permalink); ?>">
                                <img src="<?php
                                            $pic = get_field('image');
                                            echo $pic['url'];
                                            ?>" alt="image de marriage">
                            </a>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <button id="load-more">Load More</button>
        </div>
    </section>
<?php endwhile ?>
<?php get_footer(); ?>