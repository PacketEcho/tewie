<?php if(!empty($terms)): ?>
<div class="list-group">
<?php foreach($terms as $term): ?>
    <a href="<?php echo esc_attr(get_term_link($term)) ?>" class="h1 list-group-item d-flex justify-content-between align-items-center">
        <i class="fas fa-<?php echo category_description($term->term_id); ?>"></i>
        <span class=" flex-grow-1 pl-3"><?php echo esc_html($term->name) ?></span>
        <?php if($show_count): ?>
            <span class="badge badge-primary"><?php echo adverts_category_post_count( $term ) ?></span>
        <?php endif; ?>
    </a>
<?php endforeach; ?>
</div>
<?php else: ?>
<span><?php _e("No categories found.", "adverts") ?></span>
<?php endif; ?>