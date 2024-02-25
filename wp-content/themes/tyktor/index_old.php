<?php get_header(); ?>

<?php
// Рядок для пошуку
// $search = "http://test";
// Рядок для заміни
//$replace = "https://www.tyktor.online";
//$args = array(
//    'post_type' => 'post',
//    'orderby' => 'ID',
//    'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
//    'order' => 'DESC',
//    'posts_per_page' => -1, // this will retrive all the post that is published
//    'category__not_in' => array(3)
//
//);
// $result = new WP_Query($args);
//if ($result->have_posts()) {
//    while ($result->have_posts()) {
//        $result->the_post();
        // the_title();

        // wp_set_post_categories(get_the_ID(), [4], false);

        // echo '<br>';
//        wp_update_post(
//            [
//                'ID' => get_the_ID(),
//                'post_status' => 'draft'
//            ]
//        );

//        if (str_contains(get_the_content(), $search)) {
//            $r = str_replace($search, $replace, get_the_content());
//            wp_update_post(
//                [
//                    'ID' => get_the_ID(),
//                    'post_content' => $r
//                ]
//            );
//        }
//    }
//}

?>



<div class="container">
    <?php
    $posts = [];
    $countStickyPost = 0; // Кількість знайдених фіксованих записів
    $current_page = !empty($_GET['pg']) ? $_GET['pg'] : 1;

    // Отримуємо фіксовані записи
    $sticky_posts = new WP_Query([
        'post__in' => get_option('sticky_posts'), // Отримуємо список ID закріплених записів
        'ignore_sticky_posts' => 1, // Ігноруємо інші закріплені записи в запиті
        'category__in' => 3,
        // 'posts_per_page' => 10,
    ]);


    if ($sticky_posts->have_posts()) {
        $countStickyPost = $sticky_posts->found_posts;
    }

    // Якщо на першій сторінці
    if ($countStickyPost > (($current_page - 1) * 10)) {
        $posts = $sticky_posts->posts;
    }

    // Записи без фіксованих
    $latest_posts_query = new WP_Query([
        'post__not_in' => get_option('sticky_posts'),
        'category__in' => 3,
        'posts_per_page' => 10 - $countStickyPost,
        'paged' => $current_page,
    ]);

    if ($latest_posts_query->have_posts()) {
        $posts = array_merge($posts, $latest_posts_query->posts);
    }

    if (!is_null($posts)):
        ?>
        <div class="blog-list">
            <h2 class="title-underline blog-title">Новини</h2>
            <div class="blog-cards">
                <?php foreach ($posts as $post): ?>
                    <?php get_template_part('template-parts/content', '', ['post_id' => $post->ID]); ?>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ($latest_posts_query->max_num_pages > 1): ?>
        <div class="pagination">
            <?= paginate_links(array(
                'base' => site_url() . '/articles/' . '%_%',
                // 'base' => site_url() . '%_%',
                'format' => '?pg=%#%',
                'total' => $latest_posts_query->max_num_pages,
                'current' => $current_page,
                'mid_size' => 1,
            ));
            ?>
        </div>
    <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/content', 'banner'); ?>
    <?php get_template_part('template-parts/content', 'support'); ?>
</div>

<?php get_footer(); ?>
