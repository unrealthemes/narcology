		<!-- Footer start -->
		<footer> 
			<div class="container">
				<div class="row_di">
					<div class="footer_top">
						<div class="footer_top_row">
						
							<div class="footer_menu">
								<div>
									<div class="footer_menu_title">
										<?php echo ut_get_title_menu_by_location('menu_3'); ?>
									</div>
									<?php
										if ( has_nav_menu('menu_3') ) {
											wp_nav_menu( [
												'theme_location' => 'menu_3',
												'container'      => false,
												// 'walker'         => new UT_Mega_Menu(),
												'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											] );
										}
									?>
								</div>
								<div>
									<div class="footer_menu_title">
										<?php echo ut_get_title_menu_by_location('menu_4'); ?>
									</div>
									<?php
										if ( has_nav_menu('menu_4') ) {
											wp_nav_menu( [
												'theme_location' => 'menu_4',
												'container'      => false,
												// 'walker'         => new UT_Mega_Menu(),
												'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											] );
										}
									?>
								</div>
								<div>
									<div class="footer_menu_title">
										<?php echo ut_get_title_menu_by_location('menu_5'); ?>
									</div>
									<?php
										if ( has_nav_menu('menu_5') ) {
											wp_nav_menu( [
												'theme_location' => 'menu_5',
												'container'      => false,
												// 'walker'         => new UT_Mega_Menu(),
												'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											] );
										}
									?> 
								</div>
								<div>
									<div class="footer_menu_title">
										<?php echo ut_get_title_menu_by_location('menu_6'); ?>
									</div>
									<?php
										if ( has_nav_menu('menu_6') ) {
											wp_nav_menu( [
												'theme_location' => 'menu_6',
												'container'      => false,
												// 'walker'         => new UT_Mega_Menu(),
												'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											] );
										}
									?> 
								</div>
							</div> 
						</div>
					</div>
					<div class="footer_niz">
						<?php
							if ( has_nav_menu('menu_7') ) {
								wp_nav_menu( [
									'theme_location' => 'menu_7',
									'container'      => false,
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							}
						?> 
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer end -->

		
		<!-- popup 3 -->
		<div id="popup3" class="open_popup_content">
			<div class="open_popup_content_close"></div>
			
			<h5>Заказать услугу</h5>
			<form>
				<input type="text" value="" placeholder="Имя" />
				<input type="text" value="" placeholder="+7 (495) 514-31-66" />
				<button>Заказать</button>
			</form>
			
		</div>
		<!-- popup 3 end -->   

		<!-- popup 4 -->
		<div id="popup4" class="open_popup_content">
			<div class="open_popup_content_close"></div>
			
			<h5>Заполнить форму</h5>
			<form>
				<input type="text" value="" placeholder="Имя" />
				<input type="text" value="" placeholder="+7 (495) 514-31-66" />
				<button>Отправить</button>
			</form>
			
		</div>
		<!-- popup 4 end -->  
		
		<!-- Back to top -->
		<div id="back-to-top" title="Back to top">
			<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 6.5L8 1.5L1 6.5" stroke="#00AEF0" stroke-width="2"></path>
			</svg>
		</div>
		<!-- Back to top end-->

		<?php // get_template_part('template-parts/modals/..'); ?>
		
		<?php wp_footer(); ?>

    </body>
</html>   