<?php
/**
 * Template Name: Contact Page
 */

get_header();

global $blade;

echo $blade->run( 'pages.contact' );

get_footer();
