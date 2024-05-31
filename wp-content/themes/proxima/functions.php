<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// functions.php is empty, so you can easily track what code is needed in order to Vite + Tailwind JIT run well

require 'vendor/autoload.php';

use eftec\bladeone\BladeOne;
use Rlink\Proxima\InitACF;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne( $views, $cache, BladeOne::MODE_AUTO ); // MODE_DEBUG allows to pinpoint troubles.

$InitACF = new InitACF();
$InitACF->init();

include 'inc/load.inc.php';

include 'src/helpers.php';
add_filter( 'show_admin_bar', '__return_false' );
add_filter( 'gettext', function ( $translation, $text, $domain ) {

    // de_DE_formal
    // en_US

    if ( $domain !== 'proxima_lang' ) return $translation;

    [ $code ] = explode( '_', get_locale() );

    $key = explode( '.', $text );

    $lang = locate_template( 'lang/' . $code . '/' . array_shift( $key ) . '.php' );

    if ( empty( $lang ) ) return $translation;

    $lang = require $lang;

    foreach ( $key as $item ) {

        if ( !empty( $lang[ $item ] ) ) {

            if ( is_string( $lang[ $item ] ) ) $translation = $lang[ $item ];

            else $lang = $lang[ $item ];
        }
    }

    return $translation;

}, 10, 3 );


function get_list_clone_data( $parent_layout )
{
    global $wpdb;

    $prefix = $wpdb->prefix;

    $sql = "SELECT * FROM {$prefix}postmeta ";
    $sql .= "LEFT JOIN {$prefix}posts ON {$prefix}postmeta.post_id = {$prefix}posts.ID ";
    $sql .= "WHERE {$prefix}posts.post_type = 'page' AND {$prefix}postmeta.meta_key LIKE '%configurator'";

    $results = $wpdb->get_results( $sql, OBJECT );

    $array = [];

    foreach ( $results ?? [] as $item ) {
        // 'hp_advantages'

        if ( $item->post_id == $_GET[ 'post' ] ) continue;
        if ( substr( $item->meta_key, 0, 1 ) === '_' ) continue;
        if ( empty( $item->meta_value ) ) continue;

        $configurator = unserialize( $item->meta_value );

        foreach ( $configurator as $section_key => $section ) {

            if ( $section == $parent_layout ) {

                $array[] = [
                    'key'         => $item->meta_key,
                    'page_id'     => $item->ID,
                    'name'        => $item->post_title,
                    'section_key' => $section_key,
                ];

            }

        }

    }

    return $array;
}

// add_action( 'init', function () {
//     dd();
// } );

add_filter( 'acf/prepare_field', function ( $field ) {

    if ( $field[ '_name' ] == 'clone_data_parent' ) {

        $parent_layout = str_replace( 'layout_', '', $field[ 'parent_layout' ] );

        $data = get_list_clone_data( $parent_layout );

        $choices = [];

        foreach ( $data as $item ) {
            $section_key            = $item[ 'section_key' ] + 1;
            $choice_key             = $item[ 'key' ] . '_' . $item[ 'page_id' ] . '_' . $item[ 'section_key' ];
            $choices[ $choice_key ] = "Page '{$item['name']}' :: Section {$section_key}";
        }

        $field[ 'choices' ] = $choices;
    }

    return $field;
} );

add_filter( 'cn_cookie_notice_output', function ( $output, $options ) {
    global $blade;
    return $blade->run('components.cookie', ['options' => $options]);
}, 10, 2);