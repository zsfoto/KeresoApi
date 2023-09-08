<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
                ToastMessage('<?= __('Message') ?>', '<?= $message ?>', 'notice');
<?php /*
<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?></div>
*/ ?>
