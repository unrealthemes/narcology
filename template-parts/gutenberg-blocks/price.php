<?php

/**
 * price_block Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'price-block-' . $block['id'];
$className = 'price_block';

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

$title = get_field('title_p');
$blocks = get_field('blocks_p');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/price.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="price_vn">

                <?php if ($title) : ?>
                    <h3><?php echo esc_html($title); ?></h3>
                <?php endif; ?>

                <?php if ($blocks) : ?>

                    <div class="price_vn_content"> 
                    
                        <?php 
                        foreach ($blocks as $key => $block) : 
                            $subtitle = $block['subtitle_blocks_p'];
                            $title = $block['title_blocks_p'];
                            $subtitle = $block['subtitle_blocks_p'];
                            $price = $block['price_blocks_p'];
                            $txt_btn_form = $block['txt_btn_form_blocks_p'];
                            $form = $block['select_form_blocks_p'];
                        ?>

                            <div class="price_item">

                                <?php if ($subtitle) : ?>
                                    <span><?php echo esc_html($subtitle); ?></span>
                                <?php endif; ?>

                                <?php if ($title) : ?>
                                    <h5><?php echo nl2br($title); ?></h5>
                                <?php endif; ?>

                                <?php if ($price) : ?>
                                    <div class="price"><?php echo esc_html($price); ?></div>
                                <?php endif; ?>
                                
                                <?php if ($form) : ?>
                                    <div class="popup_btn"> 
                                        <a href="#" class="open_popup btn_white" data-popup-id="price_<?php echo $key; ?>" onclick="return false">
                                            <?php echo esc_html($txt_btn_form); ?>
                                        </a> 
                                    </div>
                                <?php endif; ?>

                            </div> 

                            <?php if ($form) : ?>

                                <?php 
                                    get_template_part(
                                        'template-parts/modals/price', 
                                        'form', 
                                        [
                                            'form' => $form,
                                            'id' => 'price_' . $key,
                                        ]
                                    ); 
                                ?>

                            <?php endif; ?>

                        <?php endforeach; ?>
                        
                    </div>

                <?php endif; ?>

            </div> 
        </div>
    </div>

<?php endif; ?>