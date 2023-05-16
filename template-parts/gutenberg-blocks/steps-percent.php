<?php

/**
 * steps-percent Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'steps-percent-' . $block['id'];
$className = 'etap etap2 di_fon';

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
$blocks = get_field('img_sp');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/steps-percent.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <?php if ($blocks) : ?>

                <div class="etap_vn"> 

                    <?php 
                    foreach ($blocks as $block) : 
                        $img_url = wp_get_attachment_url( $block['img_img_sp'], 'full' );
                    ?>

                        <div class="etap_item">
                            
                            <?php if ($img_url) : ?>
                                <div class="di_img_fon">
                                    <img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_html($block['title_img_sp']); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <span><?php echo esc_html($block['percent_img_sp']); ?></span>
                            <strong><?php echo esc_html($block['title_img_sp']); ?></strong> 
                            <p><?php echo nl2br($block['txt_img_sp']); ?></p>
                        </div>
                
                    <?php endforeach; ?>
     
                </div>

            <?php endif; ?>
            
        </div>
    </div>

<?php endif; ?>