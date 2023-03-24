<?php wp_footer(); ?>

<!-- Rajout de menu via panel d'administration -->
<footer class="footer">
    <?php
    if (has_nav_menu('footer-menu')) : ?>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'my-footer-menu', // classe CSS pour customiser mon menu
        )); ?>
    <?php endif;
    ?>
    <!-- mention texte “Tous droits réservés” -->
    <div class="rights-reserved">
        <p class="my-footer-menu">Tous Droits Réservés</p>
    </div>
</footer>


<?php wp_footer(); ?>
<!-- Appeler le fichier modal contact.php (pop-up contact) -->
<?php
get_template_part( 'template_parts/contact'); 
?>
</body>

</html>