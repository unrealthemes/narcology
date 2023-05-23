<?php

/**
 * steps Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'steps-' . $block['id'];
$className = 'etap di_fon';

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

$title = get_field('title_s');
$blocks = get_field('img_s');
$form = get_field('select_form_s');
$txt_btn_form = get_field('txt_btn_form_s');
$txt_form = get_field('txt_form_s');
$phone_form = get_field('phone_form_s');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/steps.png" alt="Preview" style="width:100%;">
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
                        $img_url = wp_get_attachment_url( $block['img_img_s'], 'full' );
                    ?>

                        <div class="etap_item">
                            
                            <?php if ($img_url) : ?>
                                <div class="di_img_fon">
                                    <img src="<?php echo esc_attr($img_url); ?>" alt="<?php echo esc_html($block['title_img_s']); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <strong><?php echo esc_html($block['title_img_s']); ?></strong> 
                            <p><?php echo nl2br($block['txt_img_s']); ?></p>
                        </div>
                
                    <?php endforeach; ?>
     
                </div>

            <?php endif; ?>
            
            <div class="etap_block">

                <div class="etap_block_btn">
                    <a href="#" class="open_popup btn" data-popup-id="<?php echo 'modal_' . $id; ?>" onclick="return false">
                        <?php echo esc_html($txt_btn_form); ?>
                    </a>
                </div>

                <?php if ($phone_form) : ?>
                    <div class="etap_block_tel">
                        <a href="tel:<?php echo esc_attr($phone_form); ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.58824 1H8.76471L11.3529 7.47059L8.11765 9.41177C9.50359 12.222 11.778 14.4964 14.5882 15.8824L16.5294 12.6471L23 15.2353V20.4118C23 21.0982 22.7273 21.7565 22.2419 22.2419C21.7565 22.7273 21.0982 23 20.4118 23C15.3638 22.6932 10.6026 20.5496 7.02648 16.9735C3.45042 13.3974 1.30677 8.63625 1 3.58824C1 2.90179 1.27269 2.24346 1.75808 1.75808C2.24346 1.27269 2.90179 1 3.58824 1Z" stroke="#47BDD4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> 
                            <span><?php echo esc_html($phone_form); ?></span>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($txt_form) : ?>
                    <div class="etap_block_text">
                        <?php echo nl2br($txt_form); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php if ($form) : ?>

        <?php 
            get_template_part(
                'template-parts/modals/steps', 
                'form', 
                [
                    'form' => $form,
                    'id' => 'modal_' . $id,
                ]
            ); 
        ?>

    <?php endif; ?>

<?php endif; ?>