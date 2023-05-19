<?php 
$thumbnail = get_the_post_thumbnail(get_the_ID(), 'full'); 
$thumbnail = ($thumbnail) ? $thumbnail : '<img src="' . THEME_URI . '/img/default-image.png" alt="' . get_the_title() . '">';
$categories = get_the_category(get_the_ID());
?>

<div class="col_4_di post-card" data-id="<?php echo get_the_ID(); ?>" style="display:block;">
    <div class="home_blog_item">

        <?php if ( $thumbnail ) : ?>
            <a href="<?php the_permalink(); ?>" class="home_blog_item_img">
                <?php echo $thumbnail; ?>
            </a>
        <?php endif; ?>

        <div class="home_blog_item_desc">
            <div class="home_blog_niz"> 

                <?php if ($categories) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="data"><?php echo get_the_date('d F Y'); ?></div>
            </div> 
            <div class="home_blog_item_title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </div>  
        </div>
    </div>
</div>