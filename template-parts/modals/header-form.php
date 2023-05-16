<?php 
$form = $args['form'];
$contact_form = WPCF7_ContactForm::get_instance( $form->ID );
?>

<div id="popup1" class="open_popup_content">
    <div class="open_popup_content_close"></div>
    <?php echo do_shortcode( $contact_form->shortcode() ); ?>
</div>