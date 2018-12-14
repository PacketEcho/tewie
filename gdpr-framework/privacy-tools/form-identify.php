<?php do_action('gdpr/privacy-tools-page/identify/before'); ?>

<?php if (isset($_REQUEST['gdpr_notice']) && in_array($_REQUEST['gdpr_notice'], ['data_deleted', 'request_sent'])): ?>
    <p>
        <a href="<?= get_home_url() ?>"><?= __('Back to front page', 'gdpr-framework'); ?></a>
    </p>
<?php else: ?>

    <h3>
        <?=
            __('Please identify yourself via e-mail', 'gdpr-framework');
        ?>
    </h3>
    <form>
        <input type="hidden" name="gdpr_action" value="identify">
        <input type="hidden" name="gdpr_nonce" value="<?= $nonce ?>">
        <div class="form-group">
            <label for="gdpr_email"><?= __('Enter your email address', 'gdpr-framework') ?></label>
            <input type="email" id="gdpr_email" name="email" class="form-control" placeholder="<?= __('jane.smith@example.com', 'gdpr-framework') ?>" required>
        </div>
        <?php do_action('gdpr/privacy-tools-page/identify'); ?>

        <input type="submit" class="btn btn-primary" value="<?= __('Send email', 'gdpr-framework') ?>" id="gdpr-submit">
    </form>

<?php endif; ?>

<?php do_action('gdpr/privacy-tools-page/identify/after'); ?>
