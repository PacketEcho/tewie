<h2><?= __('Download your data', 'gdpr-framework') ?></h2>

<p>
    <?= __('You can download all your data formatted as a table for viewing.', 'gdpr-framework') ?> <br>
    <?= __('Alternatively, you can export it in machine-readable JSON format.', 'gdpr-framework') ?>
</p>

<form class="d-inline" method="POST">
    <input type="hidden" name="gdpr_nonce" value="<?= $nonce; ?>">
    <input type="hidden" name="gdpr_action" value="export">
    <input type="hidden" name="gdpr_format" value="json">
    <input type="submit" class="btn btn-primary" value="<?= __('Download as JSON', 'gdpr-framework') ?>">
</form>
<form class="d-inline" method="POST">
    <input type="hidden" name="gdpr_nonce" value="<?= $nonce; ?>">
    <input type="hidden" name="gdpr_action" value="export">
    <input type="hidden" name="gdpr_format" value="html">
    <input type="submit" class="btn btn-primary" value="<?= __('Download as HTML table', 'gdpr-framework') ?>">
</form>

<hr>
