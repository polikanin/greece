<?php

use Symfony\Component\VarDumper\VarDumper;

if ( !function_exists( 'dd' ) ) {
    /**
     * @return never
     */
    function dd( ...$vars )
    {
        if ( !in_array( \PHP_SAPI, [ 'cli', 'phpdbg' ], true ) && !headers_sent() ) {
            header( 'HTTP/1.1 500 Internal Server Error' );
        }

        foreach ( $vars as $v ) {
            VarDumper::dump( $v );
        }

        exit( 1 );
    }
}


if ( !function_exists( 'get_css_js' ) ) {
    /**
     * @return void
     * @throws Exception
     */
    function get_css_js(): void
    {
        global $blade;

        echo $blade->run( 'configurator.js' );

        ob_start();
        echo $blade->run( 'configurator.css' );
        $line = ob_get_clean();

        $line = str_replace( [ '<style>', '</style>' ], "", $line );

        echo '<style>' . $line . '</style>';
    }
}


if ( !function_exists( 'is_svg' ) ) {

    function is_svg( $attachment_id = false ): bool
    {
        if ( is_numeric( $attachment_id ) && get_post_mime_type( $attachment_id ) === 'image/svg+xml' ) return true;

        return false;
    }
}


if ( !function_exists( 'get_image_html' ) ) {
    function get_image_html( $attachment_id = false, $size = 'thumbnail', $attr = [] )
    {
        if ( !is_numeric( $attachment_id ) ) return false;

        $image_alt = trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );

        if ( empty( $attr[ 'image_alt' ] ) ) {
            if ( empty( $image_alt ) ) $image_alt = get_the_title( $attachment_id );
        }

        $class = ( !empty( $attr[ 'class' ] ) ) ? 'class="' . $attr[ 'class' ] . '"' : '';

        if ( !is_svg( $attachment_id ) ) {

            $image_data = wp_get_attachment_image_src( $attachment_id, $size );

            $image_url = $image_data[ '0' ];

        } else {

            $image_url = wp_get_attachment_url( $attachment_id );

        }

        return '<img ' . $class . ' src="' . $image_url . '" alt="' . $image_alt . '">';

    }
}

if ( !function_exists( 'get_svg_content' ) ) {
    function get_svg_content( $attachment_id = false )
    {
        if ( !is_numeric( $attachment_id ) ) return false;

        $attached_path = get_attached_file( $attachment_id );

        if ( !file_exists( $attached_path ) ) return false;

        return file_get_contents( $attached_path );
    }
}


