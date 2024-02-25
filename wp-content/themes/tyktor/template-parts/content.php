<?php $post = get_post($args['post_id']); ?>
<?php $author_id = $post->post_author; ?>
<a href="<?= get_permalink($post) ?>" class="blog-card <?= (is_sticky($post->ID) ? '_pinned' : '') ?>">
    <div class="blog-card__preview">
        <?= get_the_post_thumbnail($post, 'medium', ['loading' => 'lazy', 'decoding' => false]) ?>
    </div>
    <div class="blog-card__info">
        <div class="blog-card__date"><?= get_the_date('d.m.Y', $post) ?></div>
        <h3 class="blog-card__title">
            <?= $post->post_title ?>
        </h3>
        <div class="blog-card__author author">
            <div class="author__img">
                <?= get_avatar( $author_id, 32 , '', '', ['loading' => 'lazy']) ?>
            </div>
            <div class="author__name"><?= get_the_author_meta('first_name', $author_id)?> <?= get_the_author_meta('last_name', $author_id)?></div>
        </div>
    </div>
</a>
