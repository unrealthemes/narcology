<?php

/**
 * info-modal Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'info-modal-' . $block['id'];
$className = 'chto white';

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

$title = get_field('title_ifm');
$desc = get_field('desc_ifm');
$form = get_field('select_form_ifm');
$txt_btn_form = get_field('txt_btn_form_ifm');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/info-modal.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <div class="chto_vn">  

                <?php if ($desc) : ?>
                    <p><?php echo nl2br($desc); ?></p>
                <?php endif; ?>

                <?php if ($form) : ?>
                    <a href="#" class="open_popup btn" data-popup-id="<?php echo $id; ?>" onclick="return false">
                        <?php echo esc_html($txt_btn_form); ?>
                    </a> 
                <?php endif; ?>

            </div> 
        </div>
    </div>

    <?php if ($form) : ?>

        <?php 
            get_template_part(
                'template-parts/modals/price', 
                'form', 
                [
                    'form' => $form,
                    'id' => $id,
                ]
            ); 
        ?>

    <?php endif; ?>

<?php endif; ?>