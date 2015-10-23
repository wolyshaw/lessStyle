<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="singlePost comWidth">
        <h2 class="postTitle"><?php the_title(); ?></h2>
        <div class="allPost clearfix">
            <span class="fl">文章内容</span>
            <span class="postInfo fl">
                    时间：<?php if ((date('U')-get_the_time('U')) < 86400) {echo human_time_diff(get_the_time('U'), current_time('timestamp')) . '前';} else {the_time('Y-m-d'); }?> ・ 标签：<?php the_tags('',' ',' '); ?> ・ 分类：<?php the_category(',') ?>
            </span>
            <span class="authorUrl fr">--By <?php the_author_posts_link() ?></span>
        </div>
        <?php if ((date('U')-get_the_time('U')) > 5184000) {echo $timediva='<div class="divTime"><i class="fa fa-info-circle"></i>文章发布于<span class="spanTime">';echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';echo $timedivb='</span>可能有些数据并不适用,请理解。如果您有问题可以再下方<span class="spanTime">评论</span>或者<span class="spanTime">联系我，mail:&quot;shaw@xwlong.com&quot;</span>。</div>';}?>
        <?php the_content(''); ?>
        <?php comments_template(); ?>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>