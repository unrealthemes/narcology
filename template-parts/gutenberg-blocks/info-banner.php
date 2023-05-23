<?php

/**
 * info_banner Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'info_banner-' . $block['id'];
$className = 'top_head';

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

$img_id = get_field('img_ib');
$title = get_field('title_ib');
$desc = get_field('desc_ib');
$form = get_field('select_form_ib');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/info_banner.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row top_head_content">
                
                <div class="top_head_l">

                    <?php if ($title) : ?>
                        <h1><?php echo nl2br($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($desc) : ?>
                        <div class="top_head_li">
                            <?php echo $desc; ?>
                        </div>
                    <?php endif; ?>

                    <?php 
                    if ($form) :
                        $name_form_btn = get_field('name_form_ib');
                        $desc_form = get_field('desc_form_ib');
                    ?>
                        <div class="top_head_niz">
                            <div class="popup_btn">
                                <a href="#" class="open_popup btn_white" data-popup-id="<?php echo 'modal_' . $id; ?>" onclick="return false">
                                    <?php echo $name_form_btn; ?>
                                </a> 
                            </div>
                            <strong><?php echo nl2br($desc_form); ?></strong>
                        </div> 

                    <?php endif; ?>

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

    <?php if ($form) : ?>

        <?php 
            get_template_part(
                'template-parts/modals/info-banner', 
                'form', 
                [
                    'form' => $form,
                    'id' => 'modal_' . $id,
                ]
            ); 
        ?>

    <?php endif; ?> 

<?php endif; ?>