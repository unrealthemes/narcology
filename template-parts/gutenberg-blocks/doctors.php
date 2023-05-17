<?php

/**
 * price_block Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'doctors-' . $block['id'];
$className = 'vrach di_fon';

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

$title = get_field('title_doc');
$doctors = get_field('docs_doc');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/doctors.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <?php if ($doctors) : ?>

                <div class="vrach_vn">  

                    <?php 
                    foreach ($doctors as $doctor) : 
                        $img_url = wp_get_attachment_url( $doctor['img_docs_doc'], 'full' );
                        $fullname = $doctor['fullname_docs_doc'];
                        $position = $doctor['position_docs_doc'];
                        $desc = $doctor['desc_docs_doc'];
                        $years = $doctor['years_docs_doc'];
                    ?>

                        <div class="vrach_item">

                            <?php if ($img_url) : ?>
                                <img src="<?php echo esc_attr($img_url); ?>" alt="" />
                            <?php endif; ?>

                            <?php if ($fullname) : ?>
                                <div class="vrach_name">
                                    <?php echo esc_html($fullname); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($position) : ?>
                                <div class="vrach_job">
                                    <?php echo esc_html($position); ?>
                                </div>
                            <?php endif; ?>

                            <div class="vrach_desc">
                                <?php echo nl2br($desc); ?>
                                
                                <?php if ($years) : ?>
                                    <span>
                                        <?php echo esc_html($years); ?>
                                    </span>
                                <?php endif; ?>

                            </div>

                        </div>
                    
                    <?php endforeach; ?>
                    
                </div> 

            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>