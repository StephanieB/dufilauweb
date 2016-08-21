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

                    <article class="col span_8_of_12 block block-large">
                        <div class="img">
                            <?php $thumbId = get_post_thumbnail_id(); ?>
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'medium'); ?>
                                <img src="<?php echo $img[0]; ?>"/>
                             <?php endif; ?>
                        </div>
                        <div class="post-type <?php echo get_post_type(); ?>">
                            <?php $post_type_object = get_post_type_object(get_post_type()); ?>
                            <?php echo $post_type_object->labels->singular_name; ?>
                        </div>
                        <div class="content">
                            <h1><?php the_title(); ?></h1>
                            <time><?php echo moment(strtotime(get_the_date('m/d/Y H:i'))); ?></time>
                            <div class="excerpt">
                                <?php echo custom_excerpt(get_the_content(), 30); ?>
                                <a href="<?php the_permalink(); ?>" title="<?php _e('En savoir plus', 'dufilauweb') ?>" class="read-more">
                                    <?php _e("Lire l'article", 'dufilauweb'); ?>
                                </a>
                            </div>
                        </div>
                    </article>

                    <div class="col span_4_of_12 cta_block desktop_only">
                        <a href="" title="<?php _e('Aller à la liste des dossiers', 'dufilauweb'); ?>" class="folder">
                            <?php _e('Voir plus de dossiers', 'dufilauweb'); ?>
                            <span class="icon-plus-alt"></span>
                        </a>
                        <a href="" title="<?php _e('', 'dufilauweb'); ?>" class="posts">
                            <?php _e("Voir plus d'articles", 'dufilauweb'); ?>
                            <span class="icon-plus-alt"></span>
                        </a>
                    </div>

                <?php else: ?>

                    <article class="col span_4_of_12 block">
                        <div class="img">
                            <?php $thumbId = get_post_thumbnail_id(); ?>
                            <?php if (!empty($thumbId)): ?>
                                <?php $img = wp_get_attachment_image_src($thumbId, 'thumbnail'); ?>
                                <img src="<?php echo $img[0]; ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="post-type <?php echo get_post_type(); ?>">
                            <?php $post_type_object = get_post_type_object(get_post_type()); ?>
                            <?php echo $post_type_object->labels->singular_name; ?>
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

                <?php endif; ?>

                <?php $i++; ?>
            <?php endwhile; ?>

            <div class="cta_block tablet_only">
                <a href="" title="<?php _e('Aller à la liste des dossiers', 'dufilauweb'); ?>" class="folder col span_12_of_12">
                    <?php _e('Voir plus de dossiers', 'dufilauweb'); ?>
                    <span class="icon-plus-alt"></span>
                </a>
                <a href="" title="<?php _e('', 'dufilauweb'); ?>" class="posts col span_12_of_12">
                    <?php _e("Voir plus d'articles", 'dufilauweb'); ?>
                    <span class="icon-plus-alt"></span>
                </a>
            </div>

        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>