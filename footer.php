<footer>
	<div class="container">
		<div class="row">
			<?php
				$theme_locations = get_nav_menu_locations();
				for($i = 1; $i <= 2; $i++) {
					$menu = get_term( $theme_locations['footer'.$i], 'nav_menu' );
					if(!isset($menu->name))
						continue;
					$set = array(
						'theme_location' => 'footer'.$i, 
						'container' => 'div',
						'menu_class' => 'nav',
						'fallback_cb' => false,
						'container_class' => 'col-xs-6 col-md-3',
						'container_id' => 'footer-menu-'.$i,
						'items_wrap'      => '
							<h2 class="section-title">'.$menu->name.'</h2>
							<ul id="%1$s" class="%2$s">
							%3$s</ul>',
					);
					wp_nav_menu($set); 
				}?>
				<?php dynamic_sidebar('footer-sidebar'); ?>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="logo smaller">
					<img src="<?php bloginfo('template_url'); ?>/img/citronlab2_white.svg" alt="logo">
				</div>
			</div>
			<div class="col-sm-6 text-right copy">
				Copyright © <?php echo date('Y'); ?> CitronWeb. All Rights Reserved. Inspired by <a href="http://eclipse.org">Eclipse</a>
			</div>		
		</div>
	</div>
	<div class="clearfix"></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>