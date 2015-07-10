<form action="#" method="GET">
	<div class="input-group input-group-sm search">
		<input type="text" id="search" class="form-control" name="s" placeholder="Search" value="<?php the_search_query(); ?>">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">
				<i class="fa fa-search fa-fw"></i>
			</button>
		</span>
	</div>
</form>