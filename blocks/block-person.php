<div class="media bg-light p-3 mb-3">
    <?php if ( block_value( 'photo' ) != '' ) : ?>
        <img src="<?php block_field( 'photo' ); ?>" class="align-self-center mr-3 rounded-circle border" style="max-width: 150px;">
    <?php endif; ?>
    <div class="media-body">
        <h5 class="card-title"><?php block_field( 'name' ); ?></h5>
        <?php if ( block_value( 'role' ) != '' ) : ?>
            <h6 class="card-subtitle mb-2 text-uppercase text-muted"><?php strtoupper(block_field( 'role' )); ?></h6>
        <?php endif; ?>
        <?php if ( block_value( 'description' ) != '' ) : ?>
            <p class="card-text"><?php block_field( 'description' ); ?></p>
        <?php endif; ?>
        <?php if ( block_value( 'telephone' ) != '' ) : ?>
            <p class="card-text"><i class="fas fa-phone fa-fw"></i> <?php block_field( 'telephone' ); ?></p>
        <?php endif; ?>
        <?php if ( block_value( 'mobile' ) != '' ) : ?>
            <p class="card-text"><i class="fas fa-mobile fa-fw"></i> <?php block_field( 'mobile' ); ?></p>
        <?php endif; ?>
        <?php if ( block_value( 'email' ) != '' ) : ?>
            <a href="mailto:<?php block_field( 'email' ); ?>" class="card-link"><i class="fas fa-envelope fa-fw"></i> <span class="d-sm-none d-md-inline-block"><?php block_field( 'email' ); ?></span></a>
        <?php endif; ?>
        <?php if ( block_value( 'website' ) != '' ||  block_value( 'twitter' ) != '') : ?>
            <p class="card-text">
            <?php if ( block_value( 'twitter' ) != '' ) : ?>
                <a href="https://twitter.com/<?php block_field( 'twitter' ); ?>" class="card-link"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ( block_value( 'website' ) != '' ) : ?>
                <a href="<?php block_field( 'website' ); ?>" class="card-link"><i class="fas fa-globe"></i></a>
            <?php endif; ?>
            </p>
        <?php endif; ?>
    </div><!-- media-body -->
</div><!-- media -->