<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */



/**
 * Get permalink by template name
 */

function ut_get_permalik_by_template( $template ) {

	$result = '';

	if ( ! empty( $template ) ) {
		$pages = get_pages( [
		    'meta_key'   => '_wp_page_template',
		    'meta_value' => $template
		] );
		$template_id = $pages[0]->ID;
		$page = get_post( $template_id );
		$result = get_permalink( $page );
	}
	
	return $result;
}



/**
 * Get permalink by template name
 */

function ut_get_page_id_by_template( $template ) {

	$result = '';

	if ( ! empty( $template ) ) {
		$pages = get_pages( [
		    'meta_key'   => '_wp_page_template',
		    'meta_value' => $template
		] );
		$result = $pages[0]->ID;
	}
	
	return $result;
}



/**
 * Get name menu by location
 */

function ut_get_title_menu_by_location( $location ) {

    if ( empty( $location ) ) {
    	return false;
	}
    $locations = get_nav_menu_locations();

    if ( ! isset( $locations[ $location ] ) ) {
    	return false;
	}
    $menu_obj = get_term( $locations[ $location ], 'nav_menu' );

    return $menu_obj->name;
}



/** 
 * Admin footer modification
 */   

function ut_remove_footer_admin() {

    echo '<span id="footer-thankyou">Тема разработана <a href="https://unrealthemes.site/" target="_blank"><img src="' . THEME_URI . '/img/unreal.png" width="130"/></a></span>';
}
add_filter('admin_footer_text', 'ut_remove_footer_admin');



/** 
 * Add options page ACF pro
 */ 

if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
		'page_title'    => __('Настройки темы'),
		'menu_title'    => __('Настройки темы'),
		'menu_slug'     => 'acf-options',
	]);
}


/**
 * Custom excerpt
 */

// add_filter( 'excerpt_length', function() {
// 	return 23;
// } );

// add_filter('excerpt_more', function( $more ) {
// 	return '...';
// });



/**
 *
 */

function ut_format_size_units( $bytes ) {

    if ( $bytes >= 1073741824 ) {
        $bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
    } elseif ( $bytes >= 1048576 ) {
        $bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
    } elseif ( $bytes >= 1024 ) {
        $bytes = number_format( $bytes / 1024, 2 ) . ' KB';
    } elseif ( $bytes > 1 ) {
        $bytes = $bytes . ' bytes';
    } elseif ( $bytes == 1 ) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}



/**
 *	Remove prefix in default mime type ( application/pdf = pdf )
 */

function ut_mime_type_without_application( $default_mime_type ) {

	$mime_type = '';
	$remove_txts = array( 'application/', 'video/', 'image/', 'audio/' );

	foreach( $remove_txts as $remove_txt ) {

		if ( strstr( $default_mime_type, $remove_txt ) ) {
			$mime_type = str_replace( $remove_txt, "", $default_mime_type );
		}
	}

	return $mime_type;
}



/**
 * Remove feature image and comment for post type "page"
 */

function ut_cpt_support() {
    remove_post_type_support( 'page', 'thumbnail' );
    remove_post_type_support( 'page', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// add_action( 'admin_init', 'ut_cpt_support' );



/**
 * Cancel the display of the selected term at the top in the checkbox list of terms
 */

function ut_set_checked_ontop_default( $args ) {
	// change the default parameter to false
	if ( ! isset( $args['checked_ontop'] ) ) {
		$args['checked_ontop'] = false;
	}

	return $args;
}
// add_filter( 'wp_terms_checklist_args', 'ut_set_checked_ontop_default', 10 );



function ut_class_names( $classes ) {

	if ( is_page_template('template-home.php') ) {
		$classes[] = 'home';
	} elseif ( is_singular('post') || is_page_template('template-blog.php') ) {
		$classes[] = 'blog';
	} elseif ( is_singular('product') ) {
		$classes[] = 'curs_page';
	}

	return $classes;
}
// add_filter( 'body_class','ut_class_names' );



function ut_remove_product_editor() {
    remove_post_type_support( 'product', 'editor' );
}
add_action( 'init', 'ut_remove_product_editor' );



/**
 * Declension of a word after a number
 *
 *     // Call examples:
 *     ut_num_decline( $num, 'книга,книги,книг' )
 *     ut_num_decline( $num, 'book,books' )
 *     ut_num_decline( $num, [ 'книга', 'книги', 'книг' ] )
 *     ut_num_decline( $num, [ 'book', 'books' ] )
 *
 * @param int|string   $number       The number followed by the word. You can specify a number in HTML tags.
 * @param string|array $titles       Declension options or first word for a multiple of 1.
 * @param bool         $show_number  Specify 00 here when you do not need to display the number itself.
 *
 * @return string For example: 1 книга, 2 книги, 10 книг.
 *
 * @version 3.1
 */
function ut_num_decline( $number, $titles, $show_number = true ) {

	if( is_string( $titles ) ){
		$titles = preg_split( '/, */', $titles );
	}

	// когда указано 2 элемента
	if( empty( $titles[2] ) ){
		$titles[2] = $titles[1];
	}

	$cases = [ 2, 0, 1, 1, 1, 2 ];

	$intnum = abs( (int) strip_tags( $number ) );

	$title_index = ( $intnum % 100 > 4 && $intnum % 100 < 20 )
		? 2
		: $cases[ min( $intnum % 10, 5 ) ];

	return ( $show_number ? "$number " : '' ) . $titles[ $title_index ];
}



function ut_branding_login() { 

    $logo_id = get_field('logo_header', 'options');
    $logo_url = wp_get_attachment_url( $logo_id, 'full' );
    echo '<style>
			.login h1 a {
                background-image: url(' . $logo_url . ') !important;
                width: 100% !important;
                background-position: center !important;
                background-size: contain !important;
            }
          </style>';
    
}
// add_action( 'login_enqueue_scripts', 'ut_branding_login' );



function ut_custom_login_url( $url ) {
    return home_url();
}
// add_filter( 'login_headerurl', 'ut_custom_login_url' );



function ut_comment( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? 'row_di' : 'parent row_di', null, null, false );
	$count = get_comment_meta($comment->comment_ID, 'vote', true);
	$count = ( $count == '' ) ? 0 : $count;
	$disabled = ( isset($_COOKIE["vote-comment-" . $comment->comment_ID]) ) ? 'disabled' : '';
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment_vn">
			<div class="row_di coments_title"> 
				<div class="coments_r">
					<div class="coments_name">
						<?php echo $comment->comment_author; ?>
					</div> 
					<div class="data">
						<?php
						printf(
							__( '%1$s at %2$s' ),
							get_comment_date(),
							get_comment_time()
						); 
						?>
					</div>
					<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
				</div> 
			</div>
			
			<div class="coment_item_cintent">
				
				<?php comment_text(); ?>
			
				<div class="coment_niz">
					<div class="coment_niz_edit">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								[
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								]
							)
						); ?>
					</div>
					<div class="quantity_inner">        
						<button class="bt_plus" data-id="<?php comment_ID(); ?>" <?php echo $disabled; ?>>
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.03429 7.4V17M11.4892 4.104L10.6823 7.4H15.3863C15.6368 7.4 15.8839 7.45783 16.108 7.56892C16.332 7.68 16.5269 7.84129 16.6773 8.04C16.8276 8.23871 16.9292 8.4694 16.974 8.71378C17.0188 8.95817 17.0056 9.20954 16.9355 9.448L15.0555 15.848C14.9577 16.1803 14.7539 16.4723 14.4745 16.68C14.1952 16.8877 13.8555 17 13.5063 17H2.61372C2.18573 17 1.77528 16.8314 1.47265 16.5314C1.17002 16.2313 1 15.8243 1 15.4V9C1 8.57565 1.17002 8.16869 1.47265 7.86863C1.77528 7.56857 2.18573 7.4 2.61372 7.4H4.84065C5.14086 7.39984 5.43509 7.31665 5.69023 7.15978C5.94538 7.0029 6.15132 6.77857 6.28492 6.512L9.06858 1C9.44908 1.00467 9.82359 1.09454 10.1641 1.26288C10.5047 1.43122 10.8025 1.67369 11.0352 1.97216C11.268 2.27064 11.4297 2.61741 11.5083 2.98656C11.5869 3.35571 11.5804 3.73771 11.4892 4.104Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg> 
						</button>
						<input type="text" class="quantity" value="<?php echo esc_attr($count); ?>">
						<button class="bt_minus" data-id="<?php comment_ID(); ?>" <?php echo $disabled; ?>>
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.9657 10.6V1M6.51084 13.896L7.3177 10.6H2.61372C2.36319 10.6 2.11611 10.5422 1.89204 10.4311C1.66797 10.32 1.47306 10.1587 1.32274 9.96C1.17243 9.76129 1.07084 9.5306 1.02603 9.28622C0.981215 9.04183 0.994403 8.79046 1.06455 8.552L2.94453 2.152C3.04229 1.81966 3.24614 1.52771 3.52547 1.32C3.80479 1.11228 4.14454 1 4.4937 1H15.3863C15.8143 1 16.2247 1.16857 16.5274 1.46863C16.83 1.76869 17 2.17565 17 2.6V9C17 9.42435 16.83 9.83131 16.5274 10.1314C16.2247 10.4314 15.8143 10.6 15.3863 10.6H13.1594C12.8591 10.6002 12.5649 10.6834 12.3098 10.8402C12.0546 10.9971 11.8487 11.2214 11.7151 11.488L8.93142 17C8.55092 16.9953 8.17641 16.9055 7.83586 16.7371C7.49531 16.5688 7.19754 16.3263 6.96478 16.0278C6.73202 15.7294 6.57029 15.3826 6.49169 15.0134C6.41309 14.6443 6.41963 14.2623 6.51084 13.896Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg> 
						</button>
					</div>
				</div>
			</div>
		</div>

<?php
}