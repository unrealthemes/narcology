<?php

/**
 * faq Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
$className = 'faq';

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

$title = get_field('title_faq');
$blocks = get_field('blocks_faq');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/faq.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">
            
            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <?php if ($blocks) : ?>

                <div class="faq_vn">  
                    <div id="accordion-js">

                        <?php foreach ($blocks as $block) : ?>

                            <div class="item">

                                <?php if ($block['question_blocks_faq']) : ?>
                                    <div class="heading">
                                        <?php echo nl2br($block['question_blocks_faq']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($block['answer_blocks_faq']) : ?>
                                    <div class="content">
                                        <?php echo nl2br($block['answer_blocks_faq']); ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        <?php endforeach; ?>

                    </div> 
                </div> 

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>