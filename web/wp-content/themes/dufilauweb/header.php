<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,500italic,400italic,300,300italic,700,700italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,700,700italic,400,600' rel='stylesheet' type='text/css'>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="section group site-infos">
        <h1>
            <a href="<?php bloginfo('url'); ?>" title="<?php _e("Aller à la page d'accueil", 'cfrt'); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <p>
            <a href="<?php bloginfo('url'); ?>" title="<?php _e("Aller à la page d'accueil", 'cfrt'); ?>">
                <?php bloginfo('description'); ?>
            </a>
        </p>
    </div>

    <div class="site_navigation desktop_only">
        <div class="section group">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary menu',
                'container' => 'nav',
                'container_class' => 'col span_9_of_12'
            ]);
            ?>
            <div class="search col span_3_of_12">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
    <div class="site_navigation tablet_only">
        <div class="menu-burger">
            <a href="#" class="open">
                <span class="icon-menu"></span>
            </a>
            <a href="#" class="close">
                <span class="icon-cross"></span>
            </a>
        </div>
        <div class="menu-and-search">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary menu',
                'container' => 'nav',
                'container_class' => 'col span_9_of_12'
            ]);
            ?>
            <div class="search col span_3_of_12">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</header>