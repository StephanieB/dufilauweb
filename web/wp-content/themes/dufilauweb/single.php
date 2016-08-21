<?php get_header(); ?>
<div id="single">
    <?php if (have_posts()): ?>
        <div class="section group">
            <div class="col span_12_of_12 post-content">
                <?php while(have_posts()): the_post(); ?>
                    <?php breadcrumb(); ?>
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <?php setlocale(LC_ALL, 'fr_FR'); ?>
                        <time>
                            <?php echo strftime("Le %e %B %G à %Hh%M", strtotime(get_the_date('c'))); ?>
                        </time>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                        <div class="share">
                            <span class="title-share"><?php _e('Partager sur', 'dufilauweb'); ?></span>
                            <div class="addthis_toolbox addthis_default_style">
                                <a class="addthis_button_linkedin"></a>
                                <a class="addthis_button_twitter"></a>
                                <a class="addthis_button_facebook"></a>
                                <a class="addthis_button_mailto"></a>
                                <a class="addthis_button_print"></a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="section group">
            <div class="col span_12_of_12">
                <?php if (comments_open() || get_comments_number()): ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>