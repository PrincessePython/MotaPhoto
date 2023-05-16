<?php get_header(); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops ! Cette page est introuvable.'); ?></h1>
                </header>
                <div class="page-content">
                    <p><?php esc_html_e( 'Il semblerait que rien ne soit trouvé à cette adresse. Vous pouvez essayer une recherche ?'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer(); ?>


<!-- wp_redirect( home_url(), 301 ); Transfere directement sur la page d'accueil -->