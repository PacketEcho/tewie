<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="col" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'register' ); ?>
	<?php $template->the_errors(); ?>
	<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post" class="pb-3">
		<?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
		<div class="form-group">
			<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
			<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="form-control" autocomplete="off" value="<?php $template->the_posted_value( 'user_login' ); ?>">
		</div>
		<?php endif; ?>

		<div class="form-group">
			<label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail', 'theme-my-login' ); ?></label>
			<input type="email" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="form-control" autocomplete="off" value="<?php $template->the_posted_value( 'user_email' ); ?>">
		</div>
		<?php do_action( 'register_form' ); ?>

		<p class="alert alert-primary" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>
	
		<button type="submit" class="btn btn-block btn-primary" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>">Submit</button>
		<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>">
		<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>">
		<input type="hidden" name="action" value="register">
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>
