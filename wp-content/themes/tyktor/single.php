<?php get_header(); ?>

<?php $author_id = get_post()->post_author; ?>

<article class="single">
    <div class="container">

        <h1 class="title"><?= the_title() ?></h1>
		<div class="main_img_single">
			<?php the_post_thumbnail(); ?>
		</div>
        <div class="author">
            <div class="author__img">
                <?= get_avatar( $author_id, 32 ) ?>
            </div>
            <div class="author__name">
                <?= get_the_author_meta('first_name', $author_id)?> <?= get_the_author_meta('last_name', $author_id)?>
            </div>
        </div>
        <div class="editor">
            <?php if ( has_excerpt() ): ?>
                <h3><?php the_excerpt() ?></h3>
            <?php endif; ?>
            <?php the_content() ?>
        </div>
        <div class="single-footer">
            <div class="author">

            </div>
            <div class="btns">
                <?php if (getSocial('facebook') !== ''): ?>
                    <a href="<?= getSocial('facebook') ?>" target="_blank" class="btn-icon _fb">Facebook</a>
                <?php endif; ?>
                <?php if (getSocial('twitter') !== ''): ?>
                    <a href="<?= getSocial('twitter') ?>" target="_blank" class="btn-icon _tw">Twitter</a>
                <?php endif; ?>
                <?php if (getSocial('telegram') !== ''): ?>
                    <a href="<?= getSocial('telegram') ?>" target="_blank" class="btn-icon _tg">Telegram</a>
                <?php endif; ?>
            </div>
        </div>
        <?php get_template_part( 'template-parts/content', 'support'); ?>
    </div>
</article>


<?php get_footer(); ?>
