<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="col" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'lostpassword' ); ?>
	<?php $template->the_errors(); ?>
	<form name="lostpasswordform" id="lostpasswordform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'lostpassword', 'login_post' ); ?>" method="post" class="pb-3">
		<div class="form-group">
			<label for="user_login<?php $template->the_instance(); ?>" class="control-label"><?php
				if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'Username', 'theme-my-login' );
				} elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
					_e( 'E-mail', 'theme-my-login' );
				} else {
					_e( 'Username or E-mail', 'theme-my-login' );
				}
			?></label>
			<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="form-control" value="<?php $template->the_posted_value( 'user_login' ); ?>">
		</div>
		<button type="submit" class="btn btn-block btn-primary" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Get New Password', 'theme-my-login' ); ?>">Submit</button>
		<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'lostpassword' ); ?>">
		<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>">
		<input type="hidden" name="action" value="lostpassword">
	</form>
	<?php $template->the_action_links( array( 'lostpassword' => false ) ); ?>
</div>
