<?php

/**
 * info_banner Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'info_banner-' . $block['id'];
$className = 'top_head top_head2';

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

$img_id = get_field('img_ib2');
$title = get_field('title_ib2');
$content = get_field('content_ib2');
$desc = get_field('desc_ib2');
$form_1 = get_field('select_form_ib2');
$name_form_btn = get_field('name_form_ib2');
$form_2 = get_field('select_form_ib2_2');
$name_form_btn_2 = get_field('name_form_ib2_2');
$style_btn = ( ! ($form_1 && $name_form_btn) || ! ($form_2 && $name_form_btn_2) ) ? 'style="display:block;"' : '';
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/info_banner_2.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row top_head_content">
                <div class="top_head_l">
                    
                    <?php if ($title) : ?>
                        <h1><?php echo nl2br($title); ?></h1>
                    <?php endif; ?>
                    
                    <?php if ($content) : ?>
                        <div class="top_head2_content">
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($desc) : ?>
                        <div class="top_head_li">
                            <?php echo $desc; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="popup_btn" <?php echo $style_btn; ?>>

                        <?php if ($form_1 && $name_form_btn) : ?>

                            <a href="#" class="open_popup btn" data-popup-id="<?php echo $id . '_1'; ?>" onclick="return false">
                                <?php echo $name_form_btn; ?>
                            </a> 

                        <?php endif; ?>
                        
                        <?php if ($form_2 && $name_form_btn_2) : ?>

                            <a href="#" class="open_popup btn_white" data-popup-id="<?php echo $id . '_2'; ?>" onclick="return false">
                                <?php echo $name_form_btn_2; ?>
                            </a> 

                        <?php endif; ?>

                    </div>
                </div>
                
                <?php 
                if ($img_id) :
                    $img_url = wp_get_attachment_url( $img_id, 'full' );
                ?>

                    <div class="top_head_r">
                        <img src="<?php echo esc_attr($img_url); ?>" alt="Image">
                    </div>

                <?php endif; ?>

            </div>
        </div> 
    </div>

    <?php if ($form_1) : ?>

        <?php 
            get_template_part(
                'template-parts/modals/info-banner', 
                'form', 
                [
                    'form' => $form_1,
                    'id' => $id . '_1',
                ]
            ); 
        ?>

    <?php endif; ?> 
    
    <?php if ($form_2) : ?>

        <?php 
            get_template_part(
                'template-parts/modals/info-banner', 
                'form', 
                [
                    'form' => $form_2,
                    'id' => $id . '_2',
                ]
            ); 
        ?>

    <?php endif; ?> 

<?php endif; ?>