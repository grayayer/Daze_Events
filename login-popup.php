<?php 

/*
 *
 * Log in popup
 *
 */

$popup_args = array(
        'echo'           => true,
        'form_id'        => 'loginform',
        'label_username' => __('Username', 'events'),
        'label_password' => __('Password', 'events'),
        'label_remember' => __('Remember Me', 'events'),
        'label_log_in'   => __('Log In', 'events'),
        'id_username'    => 'user_login',
        'id_password'    => 'user_pass',
        'id_remember'    => 'rememberme',
        'id_submit'      => 'wp-submit',
        'remember'       => true,
        'value_username' => NULL,
        'value_remember' => false
);

?>

<div id="gk-popup-login">
	<div id="gk-popup-wrap">
		<h3><?php _e('Log in', 'events'); ?></h3>
		<?php wp_login_form($popup_args); ?>
	</div>
</div>
<div id="gk-popup-overlay"></div> 

<?php

// EOF