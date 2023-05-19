<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package unreal-themes
 */

get_header();
?>

	<main>

		<?php
		while ( have_posts() ) :
			the_post();
			$categories = get_the_category(get_the_ID());
			?>

			<div class="di_fon2">
				<div class="container">
					<div class="row_di">
						<div class="blog_post"> 	
							<article class="blog_post_content">
								<div class="row_di">  
								
									<?php the_post_thumbnail(); ?> 
									
									<ul class="blog_post_ul"> 

										<?php if ($categories) : ?>
											<?php foreach ($categories as $category) : ?>
												<li>
													<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
														<?php echo esc_html($category->name); ?>
													</a>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>

										<li><?php echo get_the_date('d F Y'); ?></li>
									</ul> 
									
									<?php the_title('<h1>', '</h1>'); ?> 
									
									<div class="container_di_780">

										<?php the_content(); ?>
								
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>

			<?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php get_template_part('template-parts/related', 'posts'); ?>

		<?php endwhile; ?>

	</main>

<?php
get_footer();