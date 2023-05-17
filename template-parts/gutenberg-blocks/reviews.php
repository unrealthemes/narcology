<?php

/**
 * reviews Block Template.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'reviews-' . $block['id'];
$className = 'reviews di_fon white';

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

$title = get_field('title_rw');
$tabs = get_field('tabs_rw');
$txt_link = get_field('txt_link_rw');
$link = get_field('link_rw');
?>

<?php if ( !empty( $_POST['query']['preview'] ) ) : ?>

    <figure>
        <img src="<?php echo THEME_URI; ?>/img/gutenberg-preview/reviews.png" alt="Preview" style="width:100%;">
    </figure>

<?php else : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="container">

            <?php if ($title) : ?>
                <h3><?php echo nl2br($title); ?></h3>
            <?php endif; ?>

            <div class="reviews_vn">  

                <?php if ($tabs) : ?>
                    
                    <div class="tabs">
                        <ul>

                            <?php 
                            foreach ($tabs as $tab) : 
                                $img_url = wp_get_attachment_url( $tab['logo_tabs_rw'], 'full' ); 
                            ?>

                                <li>
                                    <?php if ($img_url) : ?>
                                        <img src="<?php echo esc_attr($img_url); ?>" alt="Tab">
                                    <?php endif; ?>
                                </li>
                            
                            <?php endforeach; ?>

                        </ul>
                        <div class="tabs_content">
                        
                            <?php 
                            foreach ($tabs as $tab) : 
                                $reviews = $tab['reviews_tabs_rw']
                            ?>

                                <?php if ($reviews) : ?>

                                    <div> 
                                        <div class="owl_top_list owl-carousel owl-theme gallery"> 
                                            
                                            <?php foreach ($reviews as $review) : ?>

                                                <div class="item">  
                                                    <div class="item_vn white">  

                                                        <?php if ($review['title_reviews_tabs_rw']) : ?>
                                                            <div class="item_title">
                                                                <?php echo esc_html($review['title_reviews_tabs_rw']); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="item_niz">

                                                            <?php if ($review['txt_reviews_tabs_rw']) : ?>
                                                                <div class="item_desc">
                                                                <?php echo nl2br($review['txt_reviews_tabs_rw']); ?>
                                                                </div>  
                                                            <?php endif; ?>

                                                            <div class="item_niz2">

                                                                <?php if ($review['phone_reviews_tabs_rw']) : ?>
                                                                    <div class="item_tel">
                                                                        <?php echo esc_html($review['phone_reviews_tabs_rw']); ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <div class="item_niz3">

                                                                    <?php if ($review['site_reviews_tabs_rw']) : ?>
                                                                        <div class="item_data_link">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M9 17L4 12L9 7" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                                <path d="M20 18V16C20 14.9391 19.5786 13.9217 18.8284 13.1716C18.0783 12.4214 17.0609 12 16 12H4" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                            <span>
                                                                                <?php echo esc_html($review['site_reviews_tabs_rw']); ?>
                                                                            </span>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                    <?php if ($review['date_reviews_tabs_rw']) : ?>
                                                                        <div class="item_data">
                                                                            <?php echo esc_html($review['date_reviews_tabs_rw']); ?>
                                                                        </div>
                                                                    <?php endif; ?>

                                                                </div>  
                                                            </div>
                                                            
                                                        </div>
                                                    </div> 
                                                </div>

                                            <?php endforeach; ?>

                                        </div> 
                                    </div>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </div>            
                    </div> 

                <?php endif; ?>

                <?php if ($link && $txt_link) : ?>
                    <a href="<?php echo esc_html($link); ?>" class="btn_transparent">
                        <?php echo esc_html($txt_link); ?>
                    </a>
                <?php endif; ?>

            </div> 
        </div>
    </div>

<?php endif; ?>