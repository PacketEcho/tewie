<?php
    wp_enqueue_style( 'adverts-frontend' );
    wp_enqueue_script( 'adverts-frontend' );

    do_action( "adverts_tpl_single_top", $post_id );

    $contact_email = get_post_meta($post_id, 'adverts_email', true);
    $contact_phone = get_post_meta($post_id, 'adverts_phone', true)
?>

<div class="card border-primary">
    <div class="card-body">
        <p class="card-text mb-auto"><?php echo $post_content ?></p>
        <?php if(!empty($advert_category)): ?>
            <p class="mb-2">
            <?php foreach($advert_category as $c): ?>
            <a href="<?php echo esc_attr( get_term_link( $c ) ) ?>" class="badge badge-dark"><?php echo join( " / ", advert_category_path( $c ) ) ?></a>
            <?php endforeach; ?>
            </p>
        <?php endif; ?>
        <?php if( get_post_meta( $post_id, "adverts_price", true) ): ?>
            <span class="badge badge-price"><?php echo esc_html( adverts_get_the_price( $post_id ) ) ?></span>
        <?php endif; ?>
    </div>
    <div class="card-footer bg-transparent">
        <h5 class="text-muted">Contact</h5>
        <ul class="fa-ul">
            <li><span class="fa-li" ><i class="fas fa-user-circle"></i></span> <?php echo apply_filters( "adverts_tpl_single_posted_by", get_post_meta($post_id, 'adverts_person', true), $post_id ) ?></li>
        <?php if(!empty($contact_email)): ?>
            <li><a href="mailto:<?php echo $contact_email ?>"><span class="fa-li"><i class="fas fa-envelope"></i></span> <?php echo $contact_email ?></a></li>
        <?php endif; ?>
        <?php if(!empty($contact_phone)): ?>
            <li><span class="fa-li" ><i class="fas fa-phone"></i></span> <?php echo $contact_phone ?></li>
        <?php endif; ?>
        </ul>
    </div>
</div>
