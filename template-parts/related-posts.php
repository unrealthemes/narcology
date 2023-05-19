<?php 
global $post;

$related = get_posts( 
    [
        'category__in' => wp_get_post_categories($post->ID), 
        'numberposts'  => 4, 
        'post__not_in' => [ $post->ID ]
    ]
);

if ( $related ) :
?>

    <div class="di_fon blog_info">
        <div class="container">
            <h3>Другие новости</h3>
            <div class="blog_cat">
                <div class="row_di more"> 
                    <div class="row_10_di">
                        
                        <?php 
                        foreach ( $related as $post ) : 
                            setup_postdata( $post );
                            get_template_part('template-parts/content', 'post');
                        endforeach; 
                        wp_reset_postdata();
                        ?>
                
                    </div>
                </div> 
            </div>
        </div>
    </div>

<?php endif; ?>