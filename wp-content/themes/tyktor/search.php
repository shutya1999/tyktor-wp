<?php get_header(); ?>


<?php
global $query_string;
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = $query_split[1];
}
$search_query['post_type'] = 'post';

$search = new WP_Query([
    $search_query,
]);

global $wp_query;
$total_results = $wp_query->found_posts;
?>

<div class="container">
<!--    --><?php //$latest_posts = get_posts([
//        'category' => 3
//    ]); ?>

    <div class="blog-list">
        <h2 class="title-underline blog-title">Пошук</h2>
        <?php if( $wp_query->have_posts() ) : ?>
            <div class="blog-cards">
                <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    <?php get_template_part('template-parts/content', '', ['post_id' => get_the_ID()]); ?>
                <?php endwhile; ?>

                <div class="pagination">
                    <?= paginate_links( array(
                        'base' => site_url() . '%_%',
                        'format' => '?paged=%#%',
                        'total' => $wp_query->max_num_pages,
                        'current' => $current_page,
                        'mid_size' => 1,
                    ) );
                    ?>
                </div>

            </div>
        <?php else: ?>
            <p class="not-found">За вашим запитом «<strong><?= $_GET['s'] ?></strong>» нічого не знайдено</p>
        <?php endif; ?>
    </div>

    <?php get_template_part( 'template-parts/content', 'support'); ?>
</div>

<?php get_footer(); ?>
