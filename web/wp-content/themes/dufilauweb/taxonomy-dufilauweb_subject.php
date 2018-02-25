<?php get_header(); ?>
<div id="blog">
    <?php
    $term = get_query_var('term');
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = [
        'post_type' => 'dufilauweb_folder',
        'posts_per_page' => get_option('posts_per_page'),
        'tax_query' => [
            [
                'taxonomy' => 'dufilauweb_subject',
                'field'    => 'slug',
                'terms'    => $term,
            ],
        ],
        'paged' => $paged,
    ];
    $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()): ?>
        <div class="section group">
            <div id="taxonomy-title" class="col span_12_of_12">
                <span class="icon-folder-open folder"></span>
                <?php $termObject = get_term_by('slug', $term, 'dufilauweb_subject'); ?>
                <?php echo $termObject->name; ?>
            </div>

            <?php while($query->have_posts()): $query->the_post(); ?>

                <article class="col span_4_of_12 block custom_taxonomy">
                    <div class="img">
                        <?php $thumbId = get_post_thumbnail_id(); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php _e('En savoir plus', 'dufilauweb') ?>">
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'thumbnail'); ?>
                                <img src="<?php echo $img[0]; ?>"/>
                            <?php endif; ?>
                        </a>
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
