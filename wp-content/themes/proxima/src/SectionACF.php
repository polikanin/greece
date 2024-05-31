<?php

namespace Rlink\Proxima;

class SectionACF
{
    public $data;

    public $key;

    public $label;

    public $counter;

    public $tab_demo_preview = [];

    public $tab_content = [];

    public $tab_options = [];

    public $layout;

    public $sub_fields = [];

    public function __construct( $data )
    {
        $this->data = $data;

        $this->key     = $data[ 'key' ];
        $this->label   = $data[ 'label' ];
        $this->counter = 0;

        // $this->tab_demo_preview[] = $this->field_tab( [
        //     'label' => __( 'Demo Preview', 'marck' ),
        // ] );

        $this->tab_content[] = $this->field_tab( [
            'label' => __( 'Content', 'marck' ),
        ] );

        $this->tab_options[] = $this->field_tab( [
            'label' => __( 'Options', 'marck' ),
        ] );

        $this->tab_options[] = [
            'key'               => $this->field_fix_key( 'section_id' ),
            'label'             => __( 'Section ID ', 'marck' ),
            'name'              => 'section_id',
            'type'              => 'text',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => [
                'width' => '20',
                'class' => '',
                'id'    => '',
            ],
            'default_value'     => '',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'maxlength'         => '',
        ];

        $this->tab_options[] = [
            'key'               => $this->field_fix_key( 'clone_data_parent' ),
            'label'             => __( 'Clone Data Parent', 'marck' ),
            'name'              => 'clone_data_parent',
            'type'              => 'select',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => [
                'width' => '',
                'class' => '',
                'id'    => '',
            ],
            'choices'           => [],
            'default_value'     => false,
            'allow_null'        => 1,
            'multiple'          => 0,
            'ui'                => 0,
            'return_format'     => 'value',
            'ajax'              => 0,
            'placeholder'       => '',
        ];

        $this->set_layout();
    }

    /**
     * @param $key
     * @return string
     */
    public function field_fix_key( $key = 'fix' ): string
    {
        $this->counter += 1;
        return 'field_' . $this->key . '_' . $key;
    }

    /**
     * @return string
     */
    public function field_auto_key()
    {
        $this->counter++;
        return 'field_' . $this->key . '_' . $this->counter;
    }

    public function get_layout()
    {
        $this->add_sub_fields();
        $this->set_sub_fields();

        return $this->layout;
    }

    public function field_tab( $data = [] )
    {
        if ( !is_array( $data ) or !$data ) {
            return [
                'key'               => $this->field_auto_key(),
                'label'             => __( 'Tab lable', 'marck' ),
                'name'              => '',
                'type'              => 'tab',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'placement'         => 'top',
                'endpoint'          => 0,
            ];
        }

        if ( array_key_exists( 'key', $data ) ) {
            $data[ 'key' ] = $this->field_fix_key( $data[ 'key' ] );
        } else {
            $data[ 'key' ] = $this->field_auto_key();
        }

        if ( array_key_exists( 'label', $data ) ) {
            $data[ 'label' ] = $data[ 'label' ];
        } else {
            $data[ 'label' ] = __( 'Tab lable', 'marck' );
        }

        return [
            'key'               => $data[ 'key' ],
            'label'             => $data[ 'label' ],
            'name'              => '',
            'type'              => 'tab',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => [
                'width' => '',
                'class' => '',
                'id'    => '',
            ],
            'placement'         => 'top',
            'endpoint'          => 0,
        ];
    }


    public function set_layout(): void
    {
        $this->layout = [
            'key'        => 'layout_' . $this->key,
            'name'       => $this->key,
            'label'      => $this->label,
            'display'    => 'block',
            'sub_fields' => [],
            'min'        => '',
            'max'        => '',
        ];
    }

    public function add_sub_fields(): void
    {
        // if ( !empty( $this->data[ 'tab_demo_preview' ] ) && is_array( $this->data[ 'tab_demo_preview' ] ) ) {
        //     if ( $this->data[ 'tab_demo_preview' ][ 'key' ] == 'field_auto_key' )
        //         $this->data[ 'tab_demo_preview' ][ 'key' ] = $this->field_auto_key();
        //
        //     $this->tab_demo_preview[] = $this->data[ 'tab_demo_preview' ];
        // }

        if ( !empty( $this->data[ 'tab_content' ] ) && is_array( $this->data[ 'tab_content' ] ) ) {

            array_walk_recursive( $this->data[ 'tab_content' ], function ( &$value, $key ) {
                if ( $key === 'key' && $value == 'field_auto_key' )
                    $value = $this->field_auto_key();

                if ( $key === 'key' && $value == 'field_fix_key' )
                    $value = $this->field_fix_key();
            }, $this );

            foreach ( $this->data[ 'tab_content' ] as $tab_content ) {
                // if ( $tab_content[ 'key' ] == 'field_auto_key' )
                //     $tab_content[ 'key' ] = $this->field_auto_key();

                $this->tab_content[] = $tab_content;
            }
        }

        if ( !empty( $this->data[ 'tab_options' ] ) && is_array( $this->data[ 'tab_options' ] ) ) {

            array_walk_recursive( $this->data[ 'tab_options' ], function ( &$value, $key ) {
                if ( $key === 'key' && $value == 'field_auto_key' )
                    $value = $this->field_auto_key();

                if ( $key === 'key' && $value == 'field_fix_key' )
                    $value = $this->field_fix_key();
            }, $this );

            foreach ( $this->data[ 'tab_options' ] as $tab_content ) {
                $this->tab_options[] = $tab_content;
            }
        }

        // if ( is_array( $this->tab_demo_preview ) ) {
        //     foreach ( $this->tab_demo_preview as $item ) {
        //         $this->sub_fields[] = $item;
        //     }
        // }

        if ( is_array( $this->tab_content ) ) {
            foreach ( $this->tab_content as $item ) {
                $this->sub_fields[] = $item;
            }
        }

        if ( is_array( $this->tab_options ) ) {
            foreach ( $this->tab_options as $item ) {
                $this->sub_fields[] = $item;
            }
        }
    }

    private function set_sub_fields(): void
    {
        $this->layout[ 'sub_fields' ] = $this->get_sub_fields();
    }

    private function get_sub_fields()
    {
        return $this->sub_fields;
    }
}