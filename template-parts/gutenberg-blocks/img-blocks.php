<?php

/**
 * img_blocks Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'img_blocks-' . $block['id'];
$className = 'rectangle';

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

$blocks = get_field('img_b');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/img-blocks.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <?php if ($blocks) : ?>

        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
            <div class="container">
                <div class="rectangle_vn">

                    <?php 
                    foreach ($blocks as $block) : 
                        $img_url = wp_get_attachment_url( $block['img_img_b'], 'full' );
                    ?>

                        <div class="rectangle_item">

                            <?php if ($img_url) : ?>
                                <img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_html($block['txt_img_b']); ?>">
                            <?php endif; ?>

                            <strong><?php echo esc_html($block['txt_img_b']); ?></strong> 
                        </div>
                    
                    <?php endforeach; ?>

                </div> 
            </div>
        </div>

    <?php endif; ?>

<?php endif; ?>