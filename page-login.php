<?php
get_header();
if(is_page()) {
the_post();
$errors = array(
	'username_exists' => 'Užívatel existuje',
	'empty_email' => 'Nezadali ste email',
	'accept_error' => 'Musíte súhlasiť s podmienkami',
	'password_error' => 'Heslá sa nezhodujú'
);
?>
<main>
	<section class="breadcrumb-wrap">
		<div class="container">
			<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<li	itemprop="itemListElement" 
					itemscope 
					itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php get_home_url(); ?>">
							<span itemprop="name">Home</span>
						</a>
						<meta itemprop="position" content="0" />
				</li>
				<li	itemprop="itemListElement" 
					itemscope 
					itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo '//'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
							<span itemprop="name">Login</span>
						</a>
						<meta itemprop="position" content="1" />
				</li>
			</ol>
		</div>
	</section>
	<div class="background-grey">
		<div class="container">
			<section class="row offset-small">
				<div class="col-sm-12">
					<?php if(strlen(trim(the_content()))) {?>
					<div class="well well-sm"><?php the_content(); ?></div>
					<?php } ?>
					<?php foreach($_GET as $err=>$m) {?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo (isset($errors[$err])? $errors[$err]: $err); ?>
					</div>
					<?php }?>
				</div>
				<div class="col-sm-5 login">
					<h2>CitronLab Login</h2>
					<p>Prihláste sa skorej vytvoreným účtom.</p>
					<?php 
						include('login.php');
					?>
				</div>
				<div class="col-sm-7 register">
					<h2>CitronLab Register</h2>
					<p>Staňte sa študentom CitronLabu a pridajte sa k našej komunite.</p>
					<?php include('register.php'); ?>
				</div>
			</section>
		</div>
	</div>
</main>
<?php
}

?>
<?php
get_footer();
?>