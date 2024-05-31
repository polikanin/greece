<?php

add_action( 'init', function () {
    add_post_type_support( 'page', 'excerpt' );
} );

add_action( 'after_setup_theme', function () {

    // add_theme_support( 'woocommerce' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( [
        'primary'        => 'Primary', // __( 'Primary', 'proxima' ),
        'primary_second' => 'Primary Second', // __( 'Primary', 'proxima' ),
        'primary_mobile' => 'Primary Mobile', // __( 'Primary', 'proxima' ),
        'footer'         => 'Footer', // __( 'Footer', 'proxima' ),
        'footer_tiny'    => 'Footer Tiny', // __( 'Footer', 'proxima' ),
        // 'mobile'      => 'Mobile', // __( 'Mobile', 'marck' ),
        // 'lang'        => 'Language switcher', // __( 'Language switcher', 'proxima' ),
    ] );

    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

} );
