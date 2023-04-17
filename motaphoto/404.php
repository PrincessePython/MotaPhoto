<?php get_header(); ?>

<h1>testing page</h1>
<?php while (have_posts()) : the_post() ?>

<?php
$args = array(
    'post_type' => 'photo',
    'order-by' => 'date',

)


?>



<section class="filters">
        <div class="filters-1-2">
            <div class="filter-cat">
                <label for="category" class="letters-transform">Catégories</label>
                <select name="categories" id="categories-select" class="filters_text">
                    <option value="categories">
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'categorie',
                            'hide_empty' => true,
                        ));

                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $option_value = $term->slug;
                                $option_name = $term->name;
                                echo '<option value="' . $option_value . '">' . $option_name . '</option>';
                            }
                        }
                        ?>

                    </option>
                </select>
            </div>

            <div class="filter-formats">
                <label for="formats" class="letters-transform">Formats</label>
                <select name="format" id="filter-select" class="filters_text">
                    <option value="formats">
                        <?php
                        $pic_formats = get_terms(array(
                            'taxonomy' => 'format',
                            'hide_empty' => 'true',
                        ));

                        if (!empty($pic_formats) && !is_wp_error($pic_formats)) {
                            foreach ($pic_formats as $pic_format) {
                                $format_option_value = $pic_format->slug;
                                $format_option_name = $pic_format->name;
                                echo '<option value="' . $format_option_value . '">' . $format_option_name . '</option>';
                            }
                        }
                        ?>
                    </option>
                </select>
            </div>



        </div>

        <div class="filter-3">
            <label for="sort-by" class="letters-transform">Trier par</label>
            <select name="sort" id="sort-select" class="filters_text">
                <option value=""></option>
                <option value="by_date">Nouveautés</option>
                <option value="by_date">Les plus anciens</option>
            </select>

        </div>
    </section>



<?php endwhile; ?>
<?php get_footer(); ?>




























<!-- DARK ZONE :D  -->

<?php 
// get_header(); 
?>
<!-- <h1>La page n'existe pas</h1> -->
<!-- <button><a href=" -->
<?php 
// echo site_url(); 
?>
<!-- "> -->
<!-- revenir à l'accueil</a></button> -->
<?php 
// get_footer(); 
?>

<!-- wp_redirect( home_url(), 301 ); Transfere directement sur la page d'accueil -->