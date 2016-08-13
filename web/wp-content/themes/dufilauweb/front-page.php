<?php get_header(); ?>
<div id="home">
    <?php
        $query = new WP_Query([
            'post_type' => ['post', 'dufilauweb_folder'],
            'posts_per_page' => 4,
        ]);
    ?>
    <?php if ($query->have_posts()): ?>
        <div class="section group">

            <?php $i = 0; ?>
            <?php while($query->have_posts()): $query->the_post(); ?>

                <?php if ($i == 0): ?>

                    <article class="col span_9_of_12">
                        <div class="img">
                            <?php $thumbId = get_post_thumbnail_id(); ?>
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'medium'); ?>
                                <img src="<?php echo $img[0]; ?>"
                             <?php endif; ?>
                        </div>
                        <div class="post-type">
                            <?php $post_type_object = get_post_type_object(get_post_type()); ?>
                            <?php echo $post_type_object->labels->singular_name; ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <time><?php echo moment(strtotime(get_the_date('m/d/Y H:i'))); ?></time>
                        <div class="content">
                            <?php echo custom_excerpt(get_the_content(), 30); ?>
                        </div>
                    </article>

                    <div class="col span_3_of_12">
                        <a href="" title="<?php _e('Aller à la liste des dossiers', 'dufilauweb'); ?>" class="more-folder">
                            <?php _e('Voir plus de dossiers', 'dufilauweb'); ?>
                        </a>
                        <a href="" title="<?php _e('', 'dufilauweb'); ?>" class="more-posts">
                            <?php _e("Voir plus d'articles", 'dufilauweb'); ?>
                        </a>
                    </div>

                <?php else: ?>

                    <article class="col span_4_of_12">
                        <div class="img">
                            <?php $thumbId = get_post_thumbnail_id(); ?>
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'thumbnail', true); ?>
                                <img src="<?php echo $img[0]; ?>"
                            <?php endif; ?>
                        </div>
                        <div class="post-type">
                            <?php $post_type_object = get_post_type_object(get_post_type()); ?>
                            <?php echo $post_type_object->labels->singular_name; ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <time><?php echo moment(strtotime(get_the_date('m/d/Y H:i'))); ?></time>
                        <div class="content">
                            <?php echo custom_excerpt(get_the_content(), 20); ?>
                        </div>
                    </article>

                <?php endif; ?>

                <?php $i++; ?>
            <?php endwhile; ?>

        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>