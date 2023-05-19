<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

get_header();

$category = get_queried_object();
$categories = get_categories([
	'taxonomy' => $category->taxonomy,
	'type' => 'post',
	'hide_empty' => 1,
]);
?>

    <main>
        <div class="di_fon2">
            <div class="container">
                <div class="row_di">
                    <div class="blog_cat"> 
                        <div class="page_header">    
                            <div class="page_title">
                                <?php the_archive_title( '<h1>', '</h1>' ); ?>
                                <?php the_archive_description( '<div class="page-header__desc">', '</div>' ); ?>
                            </div> 

                            <?php if ($categories) : ?>
                                <ul>

                                    <?php 
                                    foreach ($categories as $cat) : 
                                        $active = ( $category->slug == $cat->slug ) ? 'active' : '';
                                    ?>

                                        <li>
                                            <a class="<?php echo $active; ?>" href="<?= esc_url( get_category_link($cat->cat_ID) ); ?>">
                                                <?php echo $cat->name; ?>
                                            </a>
                                        </li>
                                    
                                    <?php endforeach; ?>

                                </ul> 
                            <?php endif; ?>

                        </div>

                        <?php get_template_part('template-parts/select-sort'); ?>

                        <div class="row_di more"> 
                            <div class="row_10_di post-grid__list">
                           
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        get_template_part('template-parts/content', get_post_type());
                                    endwhile;
                                else :
                                    get_template_part('template-parts/content', 'none');
                                endif;
                                ?>

                             </div>

                             <svg xmlns="http://www.w3.org/2000/svg" 
                                xmlns:xlink="http://www.w3.org/1999/xlink" 
                                width="100px" 
                                height="100px" 
                                viewBox="0 0 100 100" 
                                class="preloader"
                                preserveAspectRatio="xMidYMid">
                                <circle cx="50" cy="50" fill="none" stroke="#800080" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                </circle>
                            </svg>

                        </div>
                      
                        <!-- <div class="blog_btn_more">
                            <a href="#" id="loadMore" class="btn_white">показать еще</a>
                        </div> -->
                    </div> 
                   
                </div>
            </div>  
        </div>
        
        <?php get_template_part('template-parts/order', 'form'); ?>
 
    </main>

<?php
get_footer();