<?php

get_header();

?>
<div class="container" id="content" tabindex="-1">
	<div class="row">
		<main class="site-main col" id="main">
            <article>
                <header class="entry-header">
                    <h1 class="display-3">Oh no! <small class="text-muted">Page not found</small></h1>
                </header><!-- .entry-header -->
                <div class="entry-content py-3">
                    <p class="lead">You could:
                        <ul>
                            <li>Go back to the <a href="<?php echo site_url(); ?>">homepage</a></li>
                            <li>Try <a href="<?php echo site_url(); ?>/search/">searching</a> for the page you were looking for</li>
                            <li><a href="<?php echo site_url(); ?>/contact/">Tell us</a> about the error and we'll see if it needs fixing</li>
                        </ul>
                    </p>
                </div><!-- .entry-content -->
            </article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
