<?php 
$logo_id = get_field('logo_h', 'option');
$shedules = get_field('shedules_h', 'option');
$address = get_field('address_h', 'option');
$phone = get_field('phone_h', 'option');
$form = get_field('select_form_h', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#00AEF0">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URI; ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URI; ?>/img//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URI; ?>/img//favicon-16x16.png">
    <link rel="manifest" href="<?php echo THEME_URI; ?>/img//site.webmanifest">
    <link rel="mask-icon" href="<?php echo THEME_URI; ?>/img//safari-pinned-tab.svg" color="#47BDD4">
    <meta name="msapplication-TileColor" content="#47BDD4">
    <meta name="theme-color" content="#47BDD4"> 
    <!-- Google fonts --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet"> 

	<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

    <header> 
        <div id="site-header" class="sticky">  
            <div class="row header_top">
                 <div class="container">
                    <div class="header_top_vn">

						<?php 
						if ( $logo_id ) : 
							$logo_url = wp_get_attachment_url( $logo_id, 'full' );
						?>
							<div class="logo">
								<a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
									<?php 
										if ( get_post_mime_type($logo_id) == 'image/svg+xml' ) :
											echo file_get_contents( $logo_url );
										else :
											echo '<img src="' . $logo_url . '" alt="Нарколог">';
										endif;
									?>
								</a> 
							</div>  
						<?php endif; ?> 
     
						<?php if ($shedules) : ?>
							<div class="header_block header_time">
							<span>Время работы</span>
							<strong><?php echo esc_html($shedules); ?></strong>
							</div> 
						<?php endif; ?> 
                        
						<?php if ($shedules) : ?>
							<div class="header_block header_adress">
							<span>Адрес</span>
							<strong><?php echo esc_html($shedules); ?></strong>
							</div> 
						<?php endif; ?> 
                        
						<?php if ($phone) : ?>
							<div class="header_phone">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M3.58824 1H8.76471L11.3529 7.47059L8.11765 9.41177C9.50359 12.222 11.778 14.4964 14.5882 15.8824L16.5294 12.6471L23 15.2353V20.4118C23 21.0982 22.7273 21.7565 22.2419 22.2419C21.7565 22.7273 21.0982 23 20.4118 23C15.3638 22.6932 10.6026 20.5496 7.02648 16.9735C3.45042 13.3974 1.30677 8.63625 1 3.58824C1 2.90179 1.27269 2.24346 1.75808 1.75808C2.24346 1.27269 2.90179 1 3.58824 1Z" stroke="#47BDD4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg> 
								<a href="tel:<?php echo esc_attr($phone); ?>">
									<?php echo esc_html($phone); ?>
								</a>
							</div> 
						<?php endif; ?> 
                        
						<?php if ($form) : ?>

        
							<div class="popup_btn">
								<a href="#" class="open_popup btn_white" data-popup-id="popup1" onclick="return false">
									записаться онлайн
								</a>
							</div> 
                            
						<?php endif; ?> 

                    </div> 
                </div>
            </div> 
            <div class="header_niz">
                <div class="container">
                    <div class="header_niz_vn">
                        <div class="di_menu">
                            <div class="di_menu_text">
                                <span>
									<?php echo ut_get_title_menu_by_location('menu_2'); ?>
								</span>
                                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                	<path d="M13 1L7 7L1 0.999999" stroke="#EC1A27" stroke-width="2"/>
                                </svg>  
								<?php
									if ( has_nav_menu('menu_2') ) {
										wp_nav_menu( [
											'theme_location' => 'menu_2',
											'container'      => false,
											// 'walker'         => new UT_Mega_Menu(),
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										] );
									}
								?>
                            </div>
                        </div>
                        <div class="header_menu">
                            <div class="mobile_menu_btn">
                                <a class="header_menu_btn" id="nav-icon4" href="#" onclick="return false">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div> 
                            <nav class="row header_nav">  
								<?php
									if ( has_nav_menu('menu_1') ) {
										wp_nav_menu( [
											'theme_location' => 'menu_1',
											'container'      => false,
											// 'walker'         => new UT_Mega_Menu(),
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										] );
									}
								?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>  
        </div> 
  
    </header>

	<?php if ($form) : ?>

		<?php get_template_part('template-parts/modals/header', 'form', ['form' => $form]); ?>

	<?php endif; ?> 