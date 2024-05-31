<?php
/**
 * Template Name: Privacy Policy
 */

get_header();

$title    = get_field( 'title' );
$subtitle = get_field( 'subtitle' );
$content  = get_field( 'content' );

global $blade;

echo $blade->run( 'privacy-policy', compact( 'title', 'subtitle', 'content' ) );

get_footer();
