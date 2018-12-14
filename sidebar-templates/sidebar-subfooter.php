<?php
/**
 * Sidebar setup for footer full.
 */

?>

<?php if ( is_active_sidebar( 'subfooter' ) ) : ?>
	<section>
		<div class="container" id="subfooter-content" tabindex="-1">
			<div class="row">
				<?php dynamic_sidebar( 'subfooter' ); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
