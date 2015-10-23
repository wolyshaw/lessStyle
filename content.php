
    <!--    <div class="metaInfo clearfix">-->
    <!--        <div class="allInfo fl">全部</div>-->
    <!--        <div class="listType fr">排序方式</div>-->
    <!--    </div>-->
        <article class="postItem clearfix">
<!--            <div class="postimg fl">-->
<!--                <img src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/images/2015/10/e04b672754d574831362299c5a3d8cc214452387426702.png" alt="img"/>-->
<!--            </div>-->
            <div class="postCon fl">
                <h2 class="postTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <span class="postInfo">
                    时间：<?php if ((date('U')-get_the_time('U')) < 86400) {echo human_time_diff(get_the_time('U'), current_time('timestamp')) . '前';} else {the_time('Y-m-d'); }?> ・ 标签：<?php the_tags('',' ',' '); ?> ・ 分类：<?php the_category(',') ?>
                </span>
                <div class="postExcerpt"><?php echo get_post_excerpt(); ?></div>
            </div>
<!--            <div class="postHot fr"><p>21515</p></div>-->
        </article>
