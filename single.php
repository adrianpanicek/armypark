<?php
get_header();
?>
<?php
if(have_posts()) {
	while(have_posts()) {the_post();?>

<section class="breadcrumb-wrap">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Category</a></li>
			<li class="active">Article</li>
		</ol>
	</div>
</section>
<div class="background-white">
	<div class="container">
		<section class="row">
			<article>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
<?php
	}
}

?>
<?php
get_footer();
?>