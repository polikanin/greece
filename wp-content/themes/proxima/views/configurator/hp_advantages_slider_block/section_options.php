<?php

return [
    'label'            => __( 'Advantages Slider Block', 'proxima' ),
    'key'              => basename( __DIR__ ),
    'tab_demo_preview' => [
        'key'       => 'field_auto_key', // $section->field_auto_key(),
        'type'      => 'message',
        'message'   => 'Advantages Slider Block', // marck_section_demo_preview( $section->key ),
        'new_lines' => 'wpautop',
        'esc_html'  => 0,
    ],

    'tab_content' => [
        array(
            'key' => 'field_661dbf5464b87',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => 'br',
        ),
        array(
            'key' => 'field_662a1f789ad4b',
            'label' => 'Subtitle',
            'name' => 'subtitle',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 4,
            'new_lines' => 'br',
        ),
        array(
            'key' => 'field_661dbf59c0fec',
            'label' => 'Advantages',
            'name' => 'items',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
                array(
                    'key' => 'field_661dbf5f00d1e',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => 7,
                    'new_lines' => 'br',
                ),
                array(
                    'key' => 'field_661dbf6fef6a4',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_6643d9851f4ce',
                    'label' => 'Special design',
                    'name' => 'special',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
                array(
                    'key' => 'field_661dbfbc08547',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                ),
            ),
        ),
    ],

    'tab_options' => [],
    /**/
];
