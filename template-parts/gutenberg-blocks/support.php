<?php

/**
 * support Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'support-' . $block['id'];
$className = 'home_help di_fon home_block';

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

$title = get_field('title_sp');
$subtitle = get_field('subtitle_sp');
$blocks = get_field('blocks_sp');
$txt = get_field('txt_sp');
$form = get_field('select_form_sp');
$txt_btn_form = get_field('txt_btn_form_sp');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/support.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="home_title">

                <?php if ($title) : ?>
                    <h3><?php echo esc_html($title); ?></h3>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <div class="home_title_desk"><?php echo nl2br($subtitle); ?></div>
                <?php endif; ?>

            </div>

            <?php if ($blocks) : ?>
                <div class="home_help_content">
                
                    <?php 
                    foreach ($blocks as $block) : 
                        $img_url = wp_get_attachment_url( $block['img_blocks_sp'], 'full' );
                    ?>

                        <div class="home_help_item">

                            <?php if ($img_url) : ?>
                                <div class="home_help_item_img">
                                    <img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_html($block['txt_blocks_sp']); ?>">
                                </div>
                            <?php endif; ?>

                            <span><?php echo esc_html($block['txt_blocks_sp']); ?></span>
                        </div>
                
                    <?php endforeach; ?>
                    
                </div> 
            <?php endif; ?>

            <div class="popup_btn">

                <?php if ($txt) : ?>
                    <p><?php echo nl2br($txt); ?></p>
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
                'template-parts/modals/support', 
                'form', 
                [
                    'form' => $form,
                    'id' => $id,
                ]
            ); 
        ?>

    <?php endif; ?>

<?php endif; ?>