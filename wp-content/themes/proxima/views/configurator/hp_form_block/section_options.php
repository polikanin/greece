<?php

return [
    'label' => __('Form Block', 'proxima'),
    'key' => basename(__DIR__),
    'tab_demo_preview' => [
        'key' => 'field_auto_key', // $section->field_auto_key(),
        'type' => 'message',
        'message' => 'Form Block', // marck_section_demo_preview( $section->key ),
        'new_lines' => 'wpautop',
        'esc_html' => 0,
    ],

    'tab_content' => [
        array(
            'key' => 'field_6625791344edb',
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
            'return_format' => 'id',
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
    ],

    'tab_options' => [],
    /**/
];