<div class="support">
    <p class="support-subtitle">Підтримати Тиктора</p>
    <h2 class="support-title">Готуємо для вас більше!</h2>
    <div class="support-text">
        <p>Підтримайте наш невеликий, але дуже амбітний проєкт Тиктор.</p>
    </div>
    <div class="btns">
        <?php if (getSocial('monobank') !== ''): ?>
            <a href="<?= getSocial('monobank') ?>" class="btn-icon mono">Монобанка</a>
        <?php endif; ?>
        <?php if (getSocial('patreon') !== ''): ?>
            <a href="<?= getSocial('patreon') ?>" class="btn-icon patreon">Patreon</a>
        <?php endif; ?>
    </div>
</div>
