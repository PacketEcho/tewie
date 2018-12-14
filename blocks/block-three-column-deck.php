<div class="card-group mb-3">
    <div class="card">
        <div class="card-header text-center bg-transparent">
            <h4 class="card-title text-primary"><?php block_field( 'column-1-title' ); ?></h4>
            <?php if ( block_value( 'column-1-subtitle' ) != '' ) : ?>
                <h5 class="card-subtitle mb-2 text-muted"><?php block_field( 'column-1-subtitle' ); ?></h5>
            <?php endif; ?>
        </div>
        <div class="card-body text-center">
            <p class="card-text"><?php block_field( 'column-1-content' ); ?></p>
        </div>
        <?php if ( block_value( 'column-1-footer' ) != '' ) : ?>
            <div class="card-footer text-center bg-transparent"><?php block_field( 'column-1-footer' ); ?></div>
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="card-header text-center bg-transparent">
            <h4 class="card-title text-primary"><?php block_field( 'column-2-title' ); ?></h4>
            <?php if ( block_value( 'column-2-subtitle' ) != '' ) : ?>
                <h5 class="card-subtitle mb-2 text-muted"><?php block_field( 'column-2-subtitle' ); ?></h5>
            <?php endif; ?>
        </div>
        <div class="card-body text-center">
            <p class="card-text"><?php block_field( 'column-2-content' ); ?></p>
        </div>
        <?php if ( block_value( 'column-2-footer' ) != '' ) : ?>
            <div class="card-footer text-center bg-transparent"><?php block_field( 'column-2-footer' ); ?></div>
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="card-header text-center bg-transparent">
            <h4 class="card-title text-primary"><?php block_field( 'column-3-title' ); ?></h4>
            <?php if ( block_value( 'column-3-subtitle' ) != '' ) : ?>
                <h5 class="card-subtitle mb-2 text-muted"><?php block_field( 'column-3-subtitle' ); ?></h5>
            <?php endif; ?>
        </div>
        <div class="card-body text-center">
            <p class="card-text"><?php block_field( 'column-3-content' ); ?></p>
        </div>
        <?php if ( block_value( 'column-3-footer' ) != '' ) : ?>
            <div class="card-footer text-center bg-transparent"><?php block_field( 'column-3-footer' ); ?></div>
        <?php endif; ?>
    </div>
</div>