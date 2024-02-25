<?php
$bannerBookTitle = get_field('banner-book_title', 37);
$bannerBookText = get_field('banner-book_text', 37);
$bannerBookImg = get_field('banner-book_img', 37);
$bannerBookBtn = get_field('banner-book_btn', 37);
?>
<?php if(!is_null($bannerBookImg) && $bannerBookImg !== ""): ?>
    <div class="support banner">
        <div class="banner-info">
            <h2 class="support-title"><?= $bannerBookTitle ?></h2>
            <div class="support-text">
                <p>
                    <?= $bannerBookText ?>
                </p>
            </div>
            <div class="btns">
                <a href="<?= $bannerBookBtn['url'] ?>" class="btn-icon" target="<?= $bannerBookBtn['target'] ?>"><?= $bannerBookBtn['title'] ?></a>
            </div>
        </div>
        <div class="banner-img">
            <?= wp_get_attachment_image($bannerBookImg, 'medium', false, ['loading' => 'lazy']) ?>
        </div>
    </div>

<?php endif; ?>
