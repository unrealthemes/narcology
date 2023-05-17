<?php

/**
 * info-blocks Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'info-blocks-' . $block['id'];
$className = 'skolko di_fon';

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

$title = get_field('title_infobl');
$blocks = get_field('blocks_infobl');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/info-blocks.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <h3><?php echo nl2br($title); ?></h3>
            <?php endif; ?>

            <?php if ($blocks) : ?>

                <div class="skolko_vn">
                    
                    <?php 
                    foreach ($blocks as $key => $block) : 
                        $title = $block['title_blocks_infobl'];
                        $desc = $block['desc_blocks_infobl'];
                        $link = $block['link_blocks_infobl'];
                        $type = $block['type_blocks_infobl'];
                        $price = $block['price_blocks_infobl'];
                        $free = $block['free_blocks_infobl'];
                        $form = $block['select_form_blocks_infobl'];
                    ?>
                
                        <div class="skolko_item"> 
                            
                            <?php if ($title) : ?>
                                <strong><?php echo esc_html($title); ?></strong>
                            <?php endif; ?>

                            <?php if ($desc) : ?>
                                <p><?php echo nl2br($desc); ?></p>
                            <?php endif; ?>

                            <div class="skolko_item_niz">

                                <?php if ($type == 'free') : ?>
                                    <div class="skolko_price free">
                                        <?php echo esc_html($free); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="skolko_price">
                                        <?php echo esc_html($price); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($form) : ?>
                                    <div class="skolko_zakaz">
                                        <a href="#" class="open_popup btn btn_white" data-popup-id="info_block_<?php echo $key . '_' . $id; ?>" onclick="return false">
                                            заказать
                                        </a> 
                                    </div>
                                <?php endif; ?>

                                <?php if ($link) : ?>
                                    <div class="skolko_more">
                                        <a href="<?php echo esc_url($link); ?>" class="btn btn_white">
                                            подробнее
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
                                            'id' => 'info_block_' . $key . '_' . $id,
                                        ]
                                    ); 
                                ?>

                            <?php endif; ?>

                        </div> 

                    <?php endforeach; ?>

                </div> 

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>