<?php get_header();

?>

<?php while (have_posts()) : the_post() ?>
    <!-- La partie photo en bg + title de hero header -->
    <div class="hero-header">
        <h1 class="hero-title"><?php the_title(); ?></h1>
    </div>

    <!----------------------------------------------------------------- ici je rajoute la partie filtres ------------------------------------------->

    <!-- declaring variables and get_terms() for each filter -->
    <?php
    $terms_pic_category = get_terms(array(
        'taxonomy' => 'categorie',
        'hide_empty' => true,
    ));

    $terms_pic_formats = get_terms(array(
        'taxonomy' => 'format',
        'hide_empty' => true,
    ));

    $args = array(
        'post_type' => 'photo',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 12, // je determine la limite d'affichage ici. Pour afficher tout : -1
        'paged' => 1,
    );
    ?>

    <!-- <form action="<?php 
    // echo $_SERVER['PHP_SELF']; 
    ?>" method="post"> -->
        <section class="filters">
            <div class="filters-1-2">
                <form id="filter-cat" class="js-filter-form">
                <!-- <div class="filter-cat"> -->
                    <label for="category" class="letters-transform ">Catégories</label>
                    <select name="categories" id="categories-select" class="filters_text">
                       <option value=""></option>
                            <?php
                            if (!empty($terms_pic_category) && !is_wp_error($terms_pic_category)) {
                                foreach ($terms_pic_category as $individual_pic_cat) {
                                    $option_value = $individual_pic_cat->slug;
                                    $option_name = $individual_pic_cat->name;
                                    echo '<option value="' .$option_value. '">' . $option_name . '</option>';
                                }
                            }
                            ?>
                    </select>
                <!-- </div> -->
                </form>
                            
                <!-- <div class="filter-formats"> -->
                <form id="filter-formats">
                    <label for="formats" class="letters-transform">Formats</label>
                    <select name="format" id="filter-select" class="filters_text">
                        <option value=""></option>
                            <?php
                            if (!empty($terms_pic_formats) && !is_wp_error($terms_pic_formats)) {
                                foreach ($terms_pic_formats as $pic_format) {
                                    $format_option_value = $pic_format->slug;
                                    $format_option_name = $pic_format->name;
                                    echo '<option value="' . $format_option_value . '">' . $format_option_name . '</option>';
                                }
                            }
                            ?>
                    </select>
                <!-- </div> -->
                </form>
            </div>

            <form id="filter-date">
                <div class="filter-3">
                    <label for="sort-by" class="letters-transform">Trier par</label>
                    <select name="sort" id="sort-dates" class="filters_text">
                        <option value=""></option>
                        <option value="DESC">Nouveautés</option>
                        <option value="ASC">Les plus anciens</option>
                    </select>
                </div>
            </form>
            <!-- <button id="valider">valider</button> -->
        </section>
    <!-- </form> -->

    <div>
        <?php
            // if (isset($_POST['categories'])) {
            //     echo 'OK';
            // }
            // echo $_POST['categories'];
        ?>
    </div>


    <!-- ---------------------------------------- Add a condition to display the section if no filters selected ---------------- -->

    <!-- ici j'affiche toutes les photos en 2 colonnes  -->
    <section class="image-container">
        <?php


        // my custom query
        $allPhotos = new WP_Query($args);
        // var_dump($allPhotos);
        ?>
        <div class="display-photo">
            <?php if ($allPhotos->have_posts()) : ?>
                <div class="photo-grid">
                    <?php while ($allPhotos->have_posts()) : $allPhotos->the_post(); ?>
                        <div class="img">
                            <!-- Parcourir le tableau des images -->
                            <?php
                            $permalink = get_the_permalink();
                            ?>
                            <?php $imgs = get_field('image'); ?>
                            <?php if ($imgs) { ?>
                                <a href="<?php echo ($permalink); ?>">
                                    <img src="<?php
                                                // $pic = get_field('image');
                                                echo $imgs['url'];
                                                ?>" alt="image de marriage">
                                </a>
                            <?php }; ?>
                        </div>

                    <?php endwhile; ?>
                </div>
                <button id="load-more">Load More</button>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <!-------------------------------------------------- testing area ------------------------------------------>

    <?php
    // var_dump($terms);
    ?>


    <div class="test-categories">
        <?php
        // $terms = get_terms(array(
        //     'taxonomy' => 'categorie',
        //     'hide_empty' => true,
        // ));
        // var_dump($terms);
        // if (!empty($terms) && !is_wp_error($terms)) {
        //     foreach ($terms as $term) {
        //         $option_value = $term->slug;
        //         $option_name = $term->name;
        //         echo '<option value="' . $option_value . '">' . $option_name . '</option>';
        //     }
        // }
        ?>
    </div>

    <div class="test-photo-formats">
        <?php
        // $terms_pic_formats = get_terms(array(
        //     'taxonomy' => 'format',
        //     'hide_empty' => 'true',
        // ));
        // var_dump($pic_formats);
        // if (!empty($pic_formats) && !is_wp_error($pic_formats)){
        //     foreach ($pic_formats as $pic_format){
        //         $format_option_value = $pic_format->slug;
        //         $format_option_name = $pic_format->name;
        //         echo '<option value="' . $format_option_value . '">' . $format_option_name . '</option>';
        //     }
        // }
        ?>
    </div>

    <div class="test-filter-by-date">
        <?php
        // $filter_by_date = get_the_date('Y');
        // var_dump($filter_by_date);
        ?>
    </div>

    <!--**************************************************** filters **************************************************** -->


    <!-------------------------------------------------- end of testing area  ------------------------------------------>

<?php endwhile ?>
<?php get_footer(); ?>