<?php
/**
 * Template Name: Folder Page
 */
?>
<?php get_header(); ?>
<div id="folder-page">
    <?php
        $terms = get_terms([
            'taxonomy' => 'dufilauweb_subject',
            'hide_empty' => true,
            'hierarchical' => false
        ]);
    ?>
    <?php if (!empty($terms)): ?>
        <div class="section group">
            <?php foreach($terms as $term): ?>
                <article class="col span_12_of_12 block block-very-large">
                    <?php if (function_exists('get_wp_term_image')): ?>
                        <?php $image = get_wp_term_image($term->term_id); ?>
                    <?php endif; ?>
                    <div class="img">
                        <a href="<?php echo get_term_link($term->term_id, 'dufilauweb_subject') ?>" title="<?php _e('Accéder au dossier', 'dufilauweb'); ?>">
                            <?php if (!empty($image)): ?>
                                <img src="<?php echo $image; ?>" alt="<?php _e('Image de la catégorie', 'dufilauweb'); ?> <?php echo strtolower($term->name); ?>"/>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="term dufilauweb_folder">
                        <?php if ($term->parent != 0): ?>
                            <?php $term_parent = get_term($term->parent); ?>
                            <?php echo $term_parent->name; ?>
                        <?php else: ?>
                            <?php echo $term->name; ?>
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <h1><?php echo $term->name; ?></h1>
                        <div class="excerpt">
                            <?php echo $term->description; ?>
                            <a class="read-more" href="<?php echo get_term_link($term->term_id, 'dufilauweb_subject') ?>" title="<?php _e('Lire le dossier', 'dufilauweb'); ?>">
                                <?php _e('Lire le dossier', 'dufilauweb'); ?>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
