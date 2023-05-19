<?php 
$title = get_field('title_ofs', 'options');
$form = get_field('select_form_ofs', 'options');
$txt = get_field('txt_ofs', 'options');
?>

<div class="zakaz">
    <div class="container">
        <div class="zakaz_vn white">
            
            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <?php 
            if ($form) : 
                $contact_form = WPCF7_ContactForm::get_instance( $form->ID );
            ?>
                <div class="zakaz_form">
                    <?php echo do_shortcode( $contact_form->shortcode() ); ?>
                </div>
            <?php endif; ?>

            <?php if ($txt) : ?>
                <p><?php echo nl2br($txt); ?></p>
            <?php endif; ?>
            
        </div> 
    </div>
</div>