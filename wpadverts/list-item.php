    <div class="card">
        <?php $image = adverts_get_main_image( get_the_ID() ) ?>

        <?php if($image): ?>
            <img class="card-img-top" src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr( get_the_title() ) ?>">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>"><?php the_title() ?></a></h5>
            <?php $price = get_post_meta( get_the_ID(), "adverts_price", true ) ?>
            <?php if( $price ): ?>
                <a href="<?php the_permalink() ?>" class="badge badge-primary"><?php echo esc_html( adverts_get_the_price( get_the_ID(), $price ) ) ?></a>
            <?php endif; ?>
            <p class="card-text"><small class="text-muted"><?php echo date_i18n( get_option( 'date_format' ), get_post_time( 'U', false, get_the_ID() ) ) ?></small></p>
        </div>
    </div>
