<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/*
 * VITE & Tailwind JIT development
 * Inspired by https://github.com/andrefelipe/vite-php-setup
 *
 */

// dist subfolder - defined in vite.config.json
define( 'DIST_DEF', 'dist' );

// defining some base urls and paths
define( 'DIST_URI', get_template_directory_uri() . '/' . DIST_DEF );
define( 'DIST_PATH', get_template_directory() . '/' . DIST_DEF );

// js enqueue settings
define( 'JS_DEPENDENCY', [] ); // array('jquery') as example
define( 'JS_LOAD_IN_FOOTER', false ); // load scripts in footer?

// deafult server address, port and entry point can be customized in vite.config.json
define( 'VITE_SERVER', 'http://localhost:3000' );
define( 'VITE_ENTRY_POINT', '/main.js' );

add_filter( 'script_loader_tag', 'add_type_attribute', 10, 3 );
function add_type_attribute( $tag, $handle, $src )
{
    // if not your script, do nothing and return original $tag
    if ( 'vite_main_script' !== $handle ) return $tag;

    // change the script tag by adding type="module" and return it.
    return '<script type="module" src="' .get_template_directory_uri() . '/dist/main.bundle.js"></script>';
}

// enqueue hook
add_action( 'wp_enqueue_scripts', function () {

    // wp_deregister_script( 'jquery' );

    if ( defined( 'IS_VITE_DEVELOPMENT' ) && IS_VITE_DEVELOPMENT ) {

        // insert hmr into head for live reload
        function vite_head_module_hook()
        {
            echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
        }

        add_action( 'wp_head', 'vite_head_module_hook' );

        // wp_enqueue_script( 'vite_main_script', get_template_directory_uri() . '/assets/js/index.js', JS_DEPENDENCY, '' );
        // echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';

    } else {

        // production version, 'npm run build' must be executed in order to generate assets
        // ----------

        // read manifest.json to figure out what to enqueue
        $manifest = json_decode( file_get_contents( DIST_PATH . '/manifest.json' ), true );

        // is ok
        if ( is_array( $manifest ) ) {

            // get first key, by default is 'main.js' but it can change
            $manifest_key = array_keys( $manifest );
            if ( isset( $manifest_key[ 1 ] ) ) {

                // enqueue CSS files
                foreach ( @$manifest[ $manifest_key[ 1 ] ][ 'css' ] as $css_file ) {
                    wp_enqueue_style( 'vite_main_style', DIST_URI . '/' . $css_file );
                }

                // enqueue main JS file
                $js_file = @$manifest[ $manifest_key[ 1 ] ][ 'file' ];
                if ( !empty( $js_file ) ) {
                    wp_enqueue_script( 'vite_main_script', DIST_URI . '/' . $js_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER );
                }

            }

        }

    }

} );