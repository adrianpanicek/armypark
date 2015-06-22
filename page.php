<?php
get_header();
?>
<?php
if(is_page()) {
the_post();?>
<main>
	<section class="breadcrumb-wrap">
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Category</a></li>
				<li class="active">Article</li>
			</ol>
		</div>
	</section>
	<?php the_content(); ?>
</main>
<?php
}

?>
<?php
get_footer();
?>