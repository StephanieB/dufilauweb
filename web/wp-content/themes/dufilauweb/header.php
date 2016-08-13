<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,500italic,400italic,300,300italic,700,700italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:300,300italic' rel='stylesheet' type='text/css'>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>

    <?php
        wp_nav_menu([
            'theme_location' => 'primary menu',
            'container' => 'nav'
        ]);
    ?>
    <div id="search">
        <?php get_search_form(); ?>
    </div>
</header>