<?php get_header(); ?>

<div class="allPost comWidth">全部文章</div>
<div class="content comWidth">
    <div class="postList">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content',get_post_format() ); ?>
        <?php endwhile; ?>
    </div>
</div>
<?php
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ($max_page > 1)
    {echo '<div class="nextPage comWidth"><a href="javascript:;" data-link="'.home_url(add_query_arg(array())).'/page/" data-num="'.$max_page.'">加载更多</a></div>';
    };
?>
<?php get_footer(); ?>
