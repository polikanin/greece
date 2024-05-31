<?php

namespace Rlink\Proxima;

class InitACF
{
    /**
     * @var array
     */
    public array $sections = [];

    /**
     * @var array
     */
    public array $layouts = [];

    /**
     * @var array
     */
    public array $configurator;

    public function __construct()
    {
        $this->configurator = $this->get_configurator_data();
    }

    /**
     * @return void
     */
    public function init(): void
    {
        $sections_init = locate_template( 'configurator/sections-init.php' );

        if ( empty( $sections_init ) ) return;

        $sections = require $sections_init;

        foreach ( $sections as $section ) {

            $configurator = $this->configurator;

            $configurator[ 'key' ]                   = $section[ 'prefix' ] . $configurator[ 'key' ];
            $configurator[ 'fields' ][ 0 ][ 'key' ]  = $section[ 'prefix' ] . $configurator[ 'fields' ][ 0 ][ 'key' ];
            $configurator[ 'fields' ][ 0 ][ 'name' ] = $section[ 'prefix' ] . $configurator[ 'fields' ][ 0 ][ 'name' ];

            $configurator[ 'location' ] = $section[ 'location' ];

            // foreach ( $sections as $section_item ) {
            foreach ( $section[ 'sections' ] as $section_item ) {

                $section_options = locate_template( 'views/configurator/' . $section_item . '/section_options.php' );

                if ( empty( $section_options ) ) continue;

                $section_options = require $section_options;

                $this->set_layouts( $section_options, $section[ 'prefix' ] );

            }

            $configurator[ 'fields' ][ 0 ][ 'layouts' ] = $this->layouts;

            if ( function_exists( 'acf_add_local_field_group' ) )
                acf_add_local_field_group( $configurator );

            $this->layouts = [];

        }

        // $this->configurator[ 'fields' ][ 0 ][ 'layouts' ] = $this->layouts;
        // acf_add_local_field_group( $this->configurator );

    }

    public function get_configurator_data()
    {
        $configurator_data = [];

        $options = locate_template( 'configurator/options.php' );

        if ( $options ) require $options;

        return $configurator_data;
    }

    public function set_layouts( $section, $prefix = '' )
    {
        $section = new SectionACF( $section );

        $this->layouts[ 'layout_' . $prefix . $section->key ] = $section->get_layout();
    }
}