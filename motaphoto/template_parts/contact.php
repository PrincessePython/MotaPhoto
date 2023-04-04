<!--  Modal de contact  -->
<div class="popup">
	<div class="popup-body">
        <button id="close">x</button>
		<div class="contact-banner">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/contact-banner.png'; ?>" alt="">
		</div>
		<?php
		// Le formulaire de demandes de renseignements created with Contact Form 7
        echo do_shortcode('[contact-form-7 id="33" title="contact us" ]');
		?>
	</div> 
</div> 

