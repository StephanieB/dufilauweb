<?php get_header(); ?>
<div id="blog">
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = [
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged' => $paged,
        'cat' => get_query_var('cat')
    ];
    $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()): ?>
        <div class="section group">

            <?php while($query->have_posts()): $query->the_post(); ?>

                <article class="col span_4_of_12 block">
                    <div class="img">
                        <?php $thumbId = get_post_thumbnail_id(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php _e('En savoir plus', 'dufilauweb') ?>">
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'thumbnail'); ?>
                                <img src="<?php echo $img[0]; ?>"/>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="post-type post">
                        <?php $categories = wp_get_post_categories(get_the_ID()); ?>
                        <?php $length = count($categories); $i = 1; ?>
                        <?php foreach ($categories as $categoryId): ?>
                            <?php $category = get_category($categoryId); ?>
                            <?php echo $category->name; ?><?php if ($i < $length): ?>,<?php endif; ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="content">
                        <h1><?php the_title(); ?></h1>
                        <time><?php echo moment(strtotime(get_the_date('m/d/Y H:i'))); ?></time>
                        <div class="excerpt">
                            <?php echo custom_excerpt(get_the_content(), 20); ?>
                            <a href="<?php the_permalink(); ?>" title="<?php _e('En savoir plus', 'dufilauweb') ?>" class="read-more">
                                <?php _e("Lire l'article", 'dufilauweb'); ?>
                            </a>
                        </div>
                    </div>
                </article>

            <?php endwhile; ?>

        </div>
        <div class="pagination section group post">
            <div class="col span_12_of_12">
                <?php echo pagination($query); ?>
            </div>
        </div>

    <?php endif; ?>
</div>
<?php get_footer(); ?>
