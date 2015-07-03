<?php
get_header();
?>
<main>
<?php
the_post();
dynamic_sidebar('breadcrumb'); ?>
<div class="background-white">
	<div class="container">
		<section class="row">
			<article>
				<div class="col-md-9">
					<div class="meta">
						<span class="small">
							<i class="fa fa-clock-o"></i> <?php the_modified_date('d.m.Y G:i'); ?>
						</span>
						<span class="small">
							<i class="fa fa-user"></i> <a href=<?php the_author_link(); ?> class="stealth"><?php the_author(); ?></a>
						</span>
						<span class="small">
							<i class="fa fa-inbox"></i> <?php the_category(',');?>
						</span>
						<span class="small">
							<i class="fa fa-comments"></i> <?php comments_number(); ?>
						</span>
					</div>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<div class="comments">
						<ul class="media-list">
						<?php 
							$comments = get_comments(array(
								'post_id' => get_the_ID(),
								'status' => 'approve' //Change this to the type of comments to be displayed
							));
							wp_list_comments('type=comment&callback=cl_comment&per_page=10', $comments);
							ob_start();
?>
							<p class="comment-form-comment">
								<textarea id="comment" name="comment" aria-required="true"></textarea>
							</p>
<?php
							$comm_field =  @ob_get_clean(); 
							comment_form(array(
								'comment_notes_after' => 'Pri písaní komentára myslite na slušnosť a objektívnosť',
								//'title_reply' => null,
								'logged_in_as' => null,
								'comment_field' => $comm_field,
								'class_submit' => 'btn btn-primary pull-right'
							)); ?>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<?php dynamic_sidebar('post-meta'); ?>
					<?php dynamic_sidebar('post_category'); ?>
				</div>
				<div class="clearfix"></div>
			</article>
		</section>
	</div>
</div>
</main>
<?php
get_footer();
?>