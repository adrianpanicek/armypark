<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Adrián Paníček">
		<meta name="description" content="">
		<meta name="keywords" content="Airsoft,Lasertag,Lasergame,laser game,laserwars">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-39732339-4', 'auto');
			ga('send', 'pageview');
		</script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
	<nav class="navbar">
		<div class="navbar-brand">
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php bloginfo('template_url'); ?>/img/citronlab2.svg" alt="logo">
				</a>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="navbar-header">
			<button type="button"
			        class="navbar-toggle collapsed"
			        data-toggle="collapse"
			        data-target="#menu-menu">
				<i class="fa fa-tasks"></i>
			</button>
		</div>
	    <?php
	    $set = array(
	        'theme_location' => 'header',
	        'fallback_cb' => false,
	        'container' => '',
	        'menu_class' => 'nav navbar-nav',
	        'menu_id' => '',
	        'container_class' => 'collapse navbar-collapse',
	        'container_id' => 'main-navbar',
	    );
	    wp_nav_menu($set); ?>
	</nav>