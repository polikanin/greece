<?php

/**
 * @param bool $post_id
 * @param string $prefix
 * @return void
 * @throws Exception
 */
function get_configurator( bool $post_id = false, string $prefix = '' ): void
{
    global $blade;
    $index = 1;

    if ( class_exists( 'acf_pro' ) && have_rows( $prefix . 'configurator', $post_id ) ) {
        $data = get_field( $prefix . 'field_configurator' );

        while ( have_rows( $prefix . 'configurator', $post_id ) ) {
            the_row();

            $output = array_shift( $data );

            if ( !empty( $output[ 'clone_data_parent' ] ) ) {

                $clone_data    = explode( '_', $output[ 'clone_data_parent' ] );
                $section_index = array_pop( $clone_data );
                $page_id       = array_pop( $clone_data );
                $key           = implode( '_', $clone_data );

                $clone_data = get_field( $key, $page_id );

                if ( isset( $clone_data[ $section_index ] ) )
                    $output = $clone_data[ $section_index ];

            }

            // if ( 'hp_hello_block' == get_row_layout() ) dd( $data, array_shift( $data ), get_row_layout() );
            $output[ 'index' ] = $index;
            if ( get_row_layout() ) echo $blade->run( implode( '.', [ 'configurator', get_row_layout(), 'index' ] ), $output );
            $index++;
        }
    }
}