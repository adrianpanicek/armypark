<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CitronLab | Kurzy programovania</title>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="row">
				<div class="left">
					<div class="logo">
						<img src="<?php bloginfo('template_url'); ?>/img/citronlab2.svg" alt="logo">
					</div>
					<nav class="navbar">
						<div class="navbar-header">
							<button type="button" 
								class="navbar-toggle collapsed" 
								data-toggle="collapse" 
								data-target="#main-navbar">
								<i class="fa fa-tasks"></i>
							</button>
						</div>
						<?php 
						$set = array(
							'theme_location' => 'header', 
							'container' => '',
							'menu_class' => 'nav navbar-nav',
							'menu_id' => '',
							'container_class' => 'collapse navbar-collapse',
							'container_id' => 'main-navbar',
						);
						wp_nav_menu($set); ?>
					</nav>
				</div><div class="right">
					<form action method="GET">
						<div class="input-group input-group-sm search">
							<input type="text" class="form-control" placeholder="Search">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="fa fa-search fa-fw"></i>
								</button>
							</span>
						</div>
					</form>
					<div class="btn-group" role="group">
						<button class="btn btn-lg btn-warning lighter">
							<i class="fa fa-user-plus fa-fw"></i> Join
						</button>
						<button class="btn btn-lg btn-warning">
							Log In <i class="fa fa-user fa-fw"></i>
						</button>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>