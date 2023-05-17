<?php

/**
 * certificates Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'certificates-' . $block['id'];
$className = 'certificate di_fon';

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

$title = get_field('title_certif');
$items = get_field('items_certif');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/certificates.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">


            <?php if ($title) : ?>
                <h3><?php echo nl2br($title); ?></h3>
            <?php endif; ?>

            <?php if ($items) : ?>

                <div class="certificate_vn">  

                    <?php 
                    foreach ($items as $item) : 
                        $img_url = wp_get_attachment_url( $item['img_items_certif'], 'full' );
                        $txt = $item['txt_items_certif'];
                    ?>

                        <div class="certificate_item">

                            <?php if ($img_url) : ?>
                                <img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_attr($txt); ?>">
                            <?php endif; ?>

                            <?php if ($txt) : ?>
                                <div class="certificate_name">
                                    <?php echo esc_html($txt); ?>
                                </div> 
                            <?php endif; ?>

                        </div>
                    
                    <?php endforeach; ?>
                    
                </div> 

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>