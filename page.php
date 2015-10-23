<?php get_header(); ?>
    <div class="content comWidth">
        <div class="pageCon">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer(); ?>