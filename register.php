<form action="<?php echo esc_url(add_query_arg('action', 'register', site_url('wp-login.php', 'login_post'))); ?>" method="POST" class="form-horizontal">
	<input type="hidden" name="redirect_to" value="<?php echo cl_registration_redirect(''); ?>">
	<div class="row">
		<div class="form-group col-sm-6">
			<label class="control-label" for="username">Login</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				<input type="text" name="user_login" class="form-control">
			</div>
		</div>
		<div class="form-group col-sm-6 pull-right">
			<label class="control-label" for="email">Email</label>
			<div class="input-group">
				<input type="email" name="user_email" class="form-control">
				<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			<label class="control-label" for="password">Heslo</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i>1</span>
				<input type="password" name="password" class="form-control">
			</div>
		</div>
		<div class="form-group col-sm-6 pull-right">
			<label class="control-label" for="password2">Zopakujte heslo</label>
			<div class="input-group">
				<input type="password" name="password2" class="form-control">
				<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i>2</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<input type="checkbox" name="accept" value="1"> Súhlasím s <a href>podmienkami</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="text-left">
			<br>
			<button type="submit" name="btn-submit" tabindex="4" class="btn btn-primary btn-block">Registrovať sa</button>
		</div>
	</div>
</form>