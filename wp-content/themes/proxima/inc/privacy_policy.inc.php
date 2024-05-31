<?php


if ( function_exists( 'acf_add_local_field_group' ) ) {

    acf_add_local_field_group( [
        'key'                   => 'group_663bdc84d7499',
        'title'                 => 'Content',
        'fields'                => [
            // PRIVACY POLICY TAB
            [
                'key'               => 'field_663bdc84d748d',
                'label'             => 'Title',
                'name'              => 'title',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 4,
                'new_lines'         => 'br',
            ],
            [
                'key'               => 'field_663bb27068aa5',
                'label'             => 'Subtitle',
                'name'              => 'subtitle',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 3,
                'new_lines'         => 'br',
            ],
            [
                'key'               => 'field_663bb2b268aa7',
                'label'             => 'Content',
                'name'              => 'content',
                'type'              => 'flexible_content',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'layouts'           => [
                    'layout_663bb2c506f49' => [
                        'key'        => 'layout_663bb2c506f49',
                        'name'       => 'item',
                        'label'      => 'Section',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'               => 'field_663bb2cb68aa8',
                                'label'             => 'Type',
                                'name'              => 'type',
                                'type'              => 'select',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '',
                                    'class' => '',
                                    'id'    => '',
                                ],
                                'choices'           => [
                                    'text'  => 'Text',
                                    'table' => 'Table',
                                ],
                                'default_value'     => 'text',
                                'allow_null'        => 0,
                                'multiple'          => 0,
                                'ui'                => 0,
                                'return_format'     => 'value',
                                'ajax'              => 0,
                                'placeholder'       => '',
                            ],
                            [
                                'key'               => 'field_663bb30268aa9',
                                'label'             => 'Text',
                                'name'              => 'text',
                                'type'              => 'wysiwyg',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => [
                                    [
                                        [
                                            'field'    => 'field_663bb2cb68aa8',
                                            'operator' => '==',
                                            'value'    => 'text',
                                        ],
                                    ],
                                ],
                                'wrapper'           => [
                                    'width' => '',
                                    'class' => '',
                                    'id'    => '',
                                ],
                                'default_value'     => '',
                                'tabs'              => 'visual',
                                'toolbar'           => 'full',
                                'media_upload'      => 1,
                                'delay'             => 0,
                            ],
                            [
                                'key'               => 'field_663bb32768aaa',
                                'label'             => 'Table',
                                'name'              => 'table',
                                'type'              => 'repeater',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => [
                                    [
                                        [
                                            'field'    => 'field_663bb2cb68aa8',
                                            'operator' => '==',
                                            'value'    => 'table',
                                        ],
                                    ],
                                ],
                                'wrapper'           => [
                                    'width' => '',
                                    'class' => '',
                                    'id'    => '',
                                ],
                                'collapsed'         => '',
                                'min'               => 0,
                                'max'               => 0,
                                'layout'            => 'table',
                                'button_label'      => '',
                                'sub_fields'        => [
                                    [
                                        'key'               => 'field_663bb33168aab',
                                        'label'             => 'Col 1',
                                        'name'              => 'col_1',
                                        'type'              => 'textarea',
                                        'instructions'      => '',
                                        'required'          => 0,
                                        'conditional_logic' => 0,
                                        'wrapper'           => [
                                            'width' => '',
                                            'class' => '',
                                            'id'    => '',
                                        ],
                                        'default_value'     => '',
                                        'placeholder'       => '',
                                        'maxlength'         => '',
                                        'rows'              => '',
                                        'new_lines'         => 'br',
                                    ],
                                    [
                                        'key'               => 'field_663bb34968aac',
                                        'label'             => 'Col 2',
                                        'name'              => 'col_2',
                                        'type'              => 'textarea',
                                        'instructions'      => '',
                                        'required'          => 0,
                                        'conditional_logic' => 0,
                                        'wrapper'           => [
                                            'width' => '',
                                            'class' => '',
                                            'id'    => '',
                                        ],
                                        'default_value'     => '',
                                        'placeholder'       => '',
                                        'maxlength'         => '',
                                        'rows'              => '',
                                        'new_lines'         => 'br',
                                    ],
                                ],
                            ],
                        ],
                        'min'        => '',
                        'max'        => '',
                    ],
                ],
                'button_label'      => 'Add Row',
                'min'               => '',
                'max'               => '',
            ],
        ],
        'location'              => [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'templates/privacy_policy.php',
                ],
            ],

            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'sections',
                ],
            ],
        ],
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => [
            0 => 'the_content',
            1 => 'excerpt',
        ],
        'active'                => true,
        'description'           => '',

    ] );

}
