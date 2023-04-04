<!-- 
    Fichier qui détermine la mise en forme des posts individuels.
    Template dédiée à l’affichage d’un seul Post.
-->
<?php while (have_posts()) : the_post() ?>
    <?php
    get_header();
    global $wp_query;
    ?>

    <section class="main-content">
        <div class="content-body">
            <div class="title-type">
                <p><?php echo get_field('reference'); ?></p>
                <p><?php echo get_the_title(); ?></p>
                <p><?php echo get_the_date('Y'); ?></p>
                <p><?php echo get_field('type'); ?></p>
                <p><?php echo get_field('format'); ?></p>

            </div>

            <div class="photo-container">
                <div class="single-photo"><img src="<?php
                                                    $pic = get_field('image');
                                                    echo $pic['url'];
                                                    ?>" alt="image de marriage"></div>
            </div>
        </div>
        <div class="contact-carrousel">
            <div class="contact-btn">
                <h4>You like this photo ?</h4>
                <button id="contact-filled">Contact</button>
            </div>

            <div class="carrousel">
                <h4>Here comes carrousel</h4>
            </div>
        </div>

    </section>


    <section class="photo-suggestions">
        <h3>You might also like :</h3>
    </section>


<?php endwhile ?>
<?php get_footer(); ?>