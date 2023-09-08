<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
                ToastMessage('<?= __('Info') ?>', '<?= $message ?>', 'info');
<?php /*
<div class="message" onclick="this.classList.add('hidden');"><?= $message ?></div>
*/ ?>
