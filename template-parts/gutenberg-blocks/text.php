<?php

/**
 * text Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-' . $block['id'];
$className = 'content_text di_fon';

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

$blocks = get_field('blocks_txt');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/text.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <?php if ($blocks) : ?>

        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
            <div class="container">

                <?php foreach ($blocks as $block) : ?>

                    <div class="content_text_vn">  
                        <div class="more_text">
                            <?php echo $block['text_blocks_txt']; ?>
                        </div> 

                        <?php if ( strlen($block['text_blocks_txt']) > 585 ) : ?>
                            <div class="learn_more_text">
                                <a class="learn_morebtn_text" href="#">
                                    <span>развернуть</span>
                                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 1L7 7L1 0.999999" stroke="#47BDD4" stroke-width="2"/>
                                    </svg> 
                                </a>
                            </div> 
                        <?php endif; ?>

                    </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>

    <?php endif; ?>

<?php endif; ?>