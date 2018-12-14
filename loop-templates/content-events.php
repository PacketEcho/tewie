<?php
/**
 * The template for events on the front page
 *
 * Used for front-page.
 */

$categories = get_the_terms( $post, 'tribe_events_cat' );
if ( empty( $categories ) ) {
    $category_bg = 'default';
    $category_name = 'All';
}
else {
    $category = $categories[0];
    $term = get_term( $category, $taxonomy );
    $category_bg = $term->slug;
    $category_name = $term->name;
}
$excerpt = get_the_excerpt();
?>

<div class="col-xs-12 col-md-4">
    <div class="card card-events card-plain bg-<?php echo $category_bg; ?>" id="post-<?php the_ID(); ?>">
        <div class="content text-center">
            <h4 class="card-title"><?php the_title(); ?></h4>
            <h6><?php echo tribe_get_start_date(); ?>
            <?php if ( tribe_get_start_date() != tribe_get_end_date() ) : ?>
            - <?php echo tribe_get_end_date(); ?>
            <?php endif; ?>
            </h6>
            <?php if ( ! empty( $excerpt ) ) : ?>
            <p class="card-description"><?php echo $excerpt; ?></p>
            <?php endif; ?>
            <span class="label label-default"><?php echo $category_name ?></span>
        </div>
    </div>
</div>