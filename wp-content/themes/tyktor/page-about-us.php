<?php get_header(); ?>


<div class="container">
    <div class="about-page">
        <div class="block block-about">
            <h2 class="title-underline">Про нас</h2>
            <div class="editor">
                <?php the_field('about_text') ?>
            </div>
        </div>
        <div class="block block-about">
            <h2 class="title-underline">Контакти</h2>
            <div class="editor">
                <?php the_field('contacts_text') ?>
            </div>
        </div>

        <div class="btns social-network">
            <?php if (getSocial('facebook') !== ''): ?>
                <a href="<?= getSocial('facebook') ?>" target="_blank" class="btn-icon _fb">Facebook</a>
            <?php endif; ?>
            <?php if (getSocial('instagram') !== ''): ?>
                <a href="<?= getSocial('instagram') ?>" target="_blank" class="btn-icon _ig">Instagram</a>
            <?php endif; ?>
            <?php if (getSocial('telegram') !== ''): ?>
                <a href="<?= getSocial('telegram') ?>" target="_blank" class="btn-icon _tg">Telegram</a>
            <?php endif; ?>
            <?php if (getSocial('tik-tok') !== ''): ?>
                <a href="<?= getSocial('tik-tok') ?>" target="_blank" class="btn-icon _tt">TikTok</a>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/content', 'support'); ?>
    </div>
</div>

<?php get_footer(); ?>
