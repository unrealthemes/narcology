<?php

/**
 * title Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'title-' . $block['id'];
$className = 'top_head o_nas_head';

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
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/title.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="padding-bottom: 0;">
        <div class="container">
            <h1 style="margin-bottom: 0;"><?php the_title(); ?></h1>
        </div>
    </div>

<?php endif; ?>