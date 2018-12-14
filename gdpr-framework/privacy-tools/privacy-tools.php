<div class="gdpr-framework-privacy-tools">
    <?php do_action('gdpr/frontend/privacy-tools-page/content/before', $dataSubject); ?>

    <p><?= __('You are identified as', 'gdpr-framework'); ?> <span class="badge badge-dark"><?= esc_html($email); ?></span></p>

    <hr>

    <?php do_action('gdpr/frontend/privacy-tools-page/content', $dataSubject); ?>

    <?php do_action('gdpr/frontend/privacy-tools-page/content/after', $dataSubject); ?>
</div>
