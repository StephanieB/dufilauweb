<?php get_header(); ?>
<?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <article class="near-sephora">
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>