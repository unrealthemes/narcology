<?php 
$id = $args['id'];
$form = $args['form'];
$contact_form = WPCF7_ContactForm::get_instance( $form->ID );
?>

<div id="<?php echo $id; ?>" class="open_popup_content">
    <div class="open_popup_content_close"></div>
    <?php echo do_shortcode( $contact_form->shortcode() ); ?>
</div>