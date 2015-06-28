<?php

function cl_register_form() {
    $password = (isset( $_POST['password'])) ? $_POST['password'] : '';
    $password2 = (isset( $_POST['password2'])) ? $_POST['password2'] : '';
    ?>

    <p>
        <label for="password"><?php _e('Heslo') ?><br />
        <input type="password" name="password" id="password" class="input" value="<?php echo esc_attr(stripslashes($password)); ?>" size="25"></label>
    </p>
    <p>
        <label for="password2"><?php _e('Zopakujte Heslo') ?><br />
        <input type="password" name="password2" id="password2" class="input" value="<?php echo esc_attr(stripslashes($password2)); ?>" size="25"></label>
    </p>
    <p>
    	<input type="checkbox" name="accept" value="1"> Súhlasím s <a href>podmienkami</a>
    </p>
    <?php
}
add_action('register_form', 'cl_register_form');

function cl_registration_validate($errors, $sanitized_user_login, $user_email) {
	if(!(isset($_POST['accept']) && $_POST['accept'])) 
		$errors->add('accept_error', 'Musíte súhlasiť s podmienkami');
    if(!(isset($_POST['password']) && isset($_POST['password2']) && $_POST['password'] === $_POST['password2']))
    	$errors->add('password_error', 'Heslá sa nezhodujú');

    return $errors;
}

add_filter('registration_errors', 'cl_registration_validate', 10, 3 );

function cl_registration_save($user_id) {
	wp_set_password($_POST['password'], $user_id);
}
add_action('user_register', 'cl_registration_save', 10, 1);

function cl_registration_filter($url) {
	if(get_permalink(get_page_by_title('login')))
		return '<li><a href="'.esc_url(get_permalink(get_page_by_title('login'))).'">Registrácia</a></li>';
	else 
		return $url;
}
add_filter('register', 'cl_registration_filter');

function cl_registration_redirect($url = '') {
    return esc_url(get_permalink(get_page_by_title('login')));
}
add_filter('registration_redirect', 'cl_registration_redirect');
add_filter('logout_redirect', 'cl_registration_redirect');

function cl_register_fail_redirect($sanitized_user_login, $user_email, $errors) {
    $errors = apply_filters('registration_errors', $errors, $sanitized_user_login, $user_email);
    if($errors->get_error_code()){
        $redirect_url = cl_registration_redirect();
        foreach($errors->errors as $e => $m) {
            $redirect_url = add_query_arg($e, 1, $redirect_url);   
        }
        wp_redirect(esc_url_raw($redirect_url));
        exit;   
    }
}
add_action('register_post', 'cl_register_fail_redirect', 99, 3);

function cl_user_shortcode($args, $content="") {
?>
<div class="strip <?php echo (isset($args['background']))? $args['background']: 'background-white'; ?>">
    <div class="container">
        <section class="row offset elegant">
            <?php if(isset($args['triangle'])) { ?>
            <div class="triangle <?php echo $args['triangle']; ?> visible-lg"></div>
            <?php } ?>
            <div class="col-sm-7">
                <?php echo $content; ?>
                <?php if(isset($args['link1'])) { ?>
                <ul class="list-inline list-checkmark"><?php
                    for($i = 1; isset($args['link'.$i]); $i++) { 
                        $s = explode(' ', $args['link'.$i]);
                    ?>
                    <li>
                        <i class="fa fa-angle-double-right orange fa-fw"></i>
                        <a href="<?php echo $s[1]; ?>"><?php echo $s[0];?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="col-sm-5">
                <div class="text-center">
                    <img src="<?php echo isset($args['image'])? $args['image']: '';?>" alt>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
}
add_shortcode('cl_user', 'cl_user_shortcode');

class StudentRPG {

    const EXP_META_NAME = 'cl_exp';
    const MAX_LEVEL = 60;
    const LEVEL_BASE = 40;
    const EXP_SCALE = 45;

    public function __construct() {
        add_action('user_register', array($this, 'initExp'), 10, 1);
    }

    public function initExp($user_id) {
        add_user_meta($user_id, self::EXP_META_NAME, 0);
    }

    public static function calculateLevel($exp) {
        $level = (int) pow(($exp/self::LEVEL_BASE), (self::EXP_SCALE/100));
        return $level;
    }

    public static function calculateExp($level) {
        $exp = (int) (self::LEVEL_BASE*pow($level, (100/self::EXP_SCALE)));
        return $exp;
    }

    public function getExp($user_id) {
        return get_user_meta($user_id, self::EXP_META_NAME, true);
    }

    public function addExp($user_id, $exp) {
        $user_exp = $this->getExp($user_id);
        update_user_meta($user_id, self::EXP_META_NAME, $user_exp + $exp);
    }
}

