<?php


if ( function_exists( 'acf_add_local_field_group' ) ) {

    acf_add_local_field_group( [
        'key'                   => 'group_5db03c368b09d',
        'title'                 => 'Theme Settings',
        'fields'                => [
            // MAIN SETTINGS TAB
            [
                'key'               => 'field_5ebfac98803d0',
                'label'             => 'Main Settings',
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
            ],
            [
                'key'               => 'field_65c4cdc2de00a',
                'label'             => 'contact_page',
                'name'              => 'contact_page',
                'type'              => 'post_object',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'post_type'         => [
                    0 => 'page',
                ],
                'taxonomy'          => '',
                'allow_null'        => 0,
                'multiple'          => 0,
                'return_format'     => 'id',
                'ui'                => 1,
            ],
            [
                'key'               => 'field_65d101650b1f2',
                'label'             => 'logo',
                'name'              => 'logo',
                'type'              => 'image',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'return_format'     => 'id',
                'preview_size'      => 'medium',
                'library'           => 'all',
                'min_width'         => '',
                'min_height'        => '',
                'min_size'          => '',
                'max_width'         => '',
                'max_height'        => '',
                'max_size'          => '',
                'mime_types'        => '',
            ],
            [
                'key'               => 'field_661889eba4cfe',
                'label'             => 'Locations',
                'name'              => 'locations',
                'type'              => 'repeater',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'collapsed'         => '',
                'min'               => 0,
                'max'               => 5,
                'layout'            => 'table',
                'button_label'      => '',
                'sub_fields'        => [
                    [
                        'key'               => 'field_66188a3ea4d00',
                        'label'             => 'Country',
                        'name'              => 'country',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_66188a49a4d01',
                        'label'             => 'City',
                        'name'              => 'city',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_66188a50a4d02',
                        'label'             => 'Address',
                        'name'              => 'address',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                ],
            ],
            [
                'key'               => 'field_662d7e10e5669',
                'label'             => 'Copyright',
                'name'              => 'copyright',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],
            [
                'key'               => 'field_662d7e32e566a',
                'label'             => 'Terms and Conditions Link',
                'name'              => 'terms_and_conditions_link',
                'type'              => 'link',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'return_format'     => 'array',
            ],
            [
                'key'               => 'field_662d7e47e566b',
                'label'             => 'Privacy Policy Link',
                'name'              => 'privacy_policy_link',
                'type'              => 'link',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => [
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ],
                'return_format'     => 'array',
            ],
            [
                'key'               => 'field_6633e1b90ac7d',
                'label'             => 'Copy text',
                'name'              => 'copy_text',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],
            [
                'key' => 'field_6674a1fed609c',
                'label' => 'Notice Popup Text',
                'name' => 'notice_popup_text',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ],

            // CF7 TAB
            [
                'key'               => 'field_65405adb6a661',
                'label'             => 'CF7',
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
            ],
            [
                'key'               => 'field_65405aed05fb8',
                'label'             => 'CF7 Shortcode',
                'name'              => 'cf7_shortcode',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],

            // CONTACT TAB
            [
                'key'               => 'field_65eb57864cc01',
                'label'             => 'Contact',
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
            ],
            [
                'key'               => 'field_65eb57a14cc02',
                'label'             => 'Phone',
                'name'              => 'phone',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],
            [
                'key'               => 'field_65eb57b14cc03',
                'label'             => 'Email',
                'name'              => 'email',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],

            // DISCLAIMER TAB
            [
                'key'               => 'field_662c411ec062f',
                'label'             => 'Disclaimer',
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
            ],
            [
                'key'               => 'field_662fcf3edb8f2',
                'label'             => 'Preview text',
                'name'              => 'preview_text',
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
                'key'               => 'field_662c417695bb3',
                'label'             => 'Title',
                'name'              => 'disclaimer_title',
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
                'rows'              => 2,
                'new_lines'         => '',
            ],
            [
                'key'               => 'field_662c418395bb4',
                'label'             => 'Subtitle',
                'name'              => 'disclaimer_subtitle',
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
                'key'               => 'field_662c41a095bb5',
                'label'             => 'Text',
                'name'              => 'disclaimer_text',
                'type'              => 'wysiwyg',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
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
                'key'               => 'field_662c41ab95bb6',
                'label'             => 'List',
                'name'              => 'disclaimer_list',
                'type'              => 'repeater',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
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
                        'key'               => 'field_662c41cf95bb7',
                        'label'             => 'Title',
                        'name'              => 'title',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_662c41eb95bb8',
                        'label'             => 'Text',
                        'name'              => 'text',
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
                        'new_lines'         => '',
                    ],
                ],
            ],

            // FORM TAB
            [
                'key'               => 'field_662c9abc1559a',
                'label'             => 'Form',
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
            ],
            [
                'key'               => 'field_662c9ae37514c',
                'label'             => 'Phone Code',
                'name'              => 'phone_code',
                'type'              => 'repeater',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
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
                        'key'               => 'field_662c9af17514d',
                        'label'             => 'Value',
                        'name'              => 'value',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_662c9b077514e',
                        'label'             => 'Mask',
                        'name'              => 'mask',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_662c9b147514f',
                        'label'             => 'Placeholder',
                        'name'              => 'placeholder',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_662c9b2275150',
                        'label'             => 'Icon',
                        'name'              => 'icon',
                        'type'              => 'image',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'return_format'     => 'url',
                        'preview_size'      => 'thumbnail',
                        'library'           => 'all',
                        'min_width'         => '',
                        'min_height'        => '',
                        'min_size'          => '',
                        'max_width'         => '',
                        'max_height'        => '',
                        'max_size'          => '',
                        'mime_types'        => '',
                    ],
                ],
            ],
            [
                'key'               => 'field_662c9b7a75151',
                'label'             => 'Timeline',
                'name'              => 'timeline',
                'type'              => 'repeater',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
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
                        'key'               => 'field_662c9b8475152',
                        'label'             => 'Value',
                        'name'              => 'value',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_662c9b9075153',
                        'label'             => 'Mask',
                        'name'              => 'mask',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                ],
            ],
            [
                'key'               => 'field_6630201cc230d',
                'label'             => 'Error messages',
                'name'              => 'error_messages',
                'type'              => 'repeater',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
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
                        'key'               => 'field_66302046c230e',
                        'label'             => 'Label',
                        'name'              => 'label',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                    [
                        'key'               => 'field_6630205bc230f',
                        'label'             => 'Text',
                        'name'              => 'text',
                        'type'              => 'text',
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
                        'prepend'           => '',
                        'append'            => '',
                        'maxlength'         => '',
                    ],
                ],
            ],
            [
                'key'               => 'field_66302321412b6',
                'label'             => 'Fields',
                'name'              => 'form_fields',
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
                    'layout_66302331937db' => [
                        'key'        => 'layout_66302331937db',
                        'name'       => 'field',
                        'label'      => 'Field',
                        'display'    => 'block',
                        'sub_fields' => [
                            [
                                'key'               => 'field_66302338412b7',
                                'label'             => 'Label',
                                'name'              => 'label',
                                'type'              => 'text',
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
                                'prepend'           => '',
                                'append'            => '',
                                'maxlength'         => '',
                            ],
                            [
                                'key'               => 'field_66302343412b8',
                                'label'             => 'Values',
                                'name'              => 'values',
                                'type'              => 'repeater',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
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
                                        'key'               => 'field_66302368412b9',
                                        'label'             => 'Text',
                                        'name'              => 'text',
                                        'type'              => 'text',
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
                                        'prepend'           => '',
                                        'append'            => '',
                                        'maxlength'         => '',
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
            [
                'key'               => 'field_6634e5881c53c',
                'label'             => 'Portal id',
                'name'              => 'portal_id',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],
            [
                'key'               => 'field_6634e5981c53d',
                'label'             => 'Form id',
                'name'              => 'form_id',
                'type'              => 'text',
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
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
            ],

            // CSS TAB
            [
                'key'               => 'field_66355fb353ec3',
                'label'             => 'Css',
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
            ],
            [
                'key'               => 'field_66355f610d603',
                'label'             => 'Critical Css',
                'name'              => 'critical_css',
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
                'new_lines'         => '',
            ],

        ],
        'location'              => [
            [
                [
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'theme-settings',
                ],
            ],
        ],
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => '',

    ] );

}
