<form action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>" method="POST" class="form-horizontal">
	<div class="form-group">
		<label class="control-label" for="log">Login</label>
		<input type="text" name="log" class="form-control">
	</div>
	<div class="form-group">
		<label class="control-label" for="pwd">Heslo</label>
		<input type="password" name="pwd" class="form-control">
	</div>
	<div class="col-md-7">
		<input type="checkbox" name="rememberme" value="forever"> Zostať prihlásený
	</div>
	<div class="col-md-5">
		<a href="<?php echo wp_lostpassword_url(); ?>">Zresetovať heslo</a>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="text-left">
			<br>
			<button type="submit" name="btn-submit" tabindex="4" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
</form>