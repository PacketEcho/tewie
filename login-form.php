<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="col" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'login' ); ?>
	<?php $template->the_errors(); ?>
	<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post" class="pb-3">
		<div class="form-group">
			<label for="user_login<?php $template->the_instance(); ?>"><?php
				if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'Username', 'theme-my-login' );
				} elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'E-mail', 'theme-my-login' );
				} else {
					_e( 'Username or E-mail', 'theme-my-login' );
				}
			?></label>
			<input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control" value="<?php $template->the_posted_value( 'log' ); ?>">
		</div>
		<div class="form-group">
			<label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label>
			<input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="form-control" autocomplete="off">
		</div>
		<?php do_action( 'login_form' ); ?>
		<div class="clearfix pb-3">
			<legend><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></legend>
			<div class="btn-group btn-group-small btn-group-toggle" data-toggle="buttons">
				<label class="btn btn-light active">
					<input type="radio" name="rememberme" id="rememberme<?php $template->the_instance(); ?>-0" value="forever" checked> Yes
				</label>
				<label class="btn btn-light">
					<input type="radio" name="rememberme" id="rememberme<?php $template->the_instance(); ?>-1" value="0"> No
				</label>
			</div>
		</div>
		<button type="submit" class="btn btn-block btn-primary" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>">Submit</button>
		<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>">
		<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>">
		<input type="hidden" name="action" value="login">
	</form>
	<?php $template->the_action_links( array( 'login' => false ) ); ?>
</div>