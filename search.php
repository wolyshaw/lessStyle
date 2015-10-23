<?php get_header(); ?>

    <div class="allPost comWidth clearfix">
        <span class="fl">全部文章</span>
        <span class="fl desSpan">根据 "<?php echo get_search_query();?>" 搜索的结果。</span>
    </div>
    <div class="content comWidth">
        <div class="postList">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="searchBoxPostItem clearfix">
                    <div class="postCon fl">
                        <h2 class="postTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <span class="postInfo">
                            时间：<?php if ((date('U')-get_the_time('U')) < 86400) {echo human_time_diff(get_the_time('U'), current_time('timestamp')) . '前';} else {the_time('Y-m-d'); }?> ・ 标签：<?php the_tags('',' ',' '); ?> ・ 分类：<?php the_category(',') ?>
                        </span>
                    </div>
                </div>
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