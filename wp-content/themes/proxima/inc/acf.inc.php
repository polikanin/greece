<?php

// ACF PRO
if ( class_exists( 'acf_pro' ) ) {
    require_once get_template_directory() . '/configurator/functions.php';
}

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( [
        'page_title' => 'Theme Settings', // esc_html__( 'Theme Settings', 'proxima' ),
        'menu_title' => 'Theme Settings', // esc_html__( 'Theme Settings', 'proxima' ),
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ] );
}

require_once get_template_directory() . '/inc/theme_options.php';
