<?php

/**
 * order-form Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'order-form-' . $block['id'];
$className = 'zakaz';

if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if ( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('title_of');
$form = get_field('select_form_of');
$txt = get_field('txt_of');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/order-form.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
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

<?php endif; ?>