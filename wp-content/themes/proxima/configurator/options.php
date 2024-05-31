<?php

$configurator_data = [
    'key'                   => 'group_configurator',
    'title'                 => 'Configurator',
    'fields'                => [
        [
            'key'               => 'field_configurator',
            'label'             => 'Configurator',
            'name'              => 'configurator',
            'type'              => 'flexible_content',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => [
                'width' => '',
                'class' => '',
                'id'    => '',
            ],
            'layouts'           => [],
            'button_label'      => 'Add section',
            'min'               => '',
            'max'               => '',
        ],
    ],
    'location'              => [
        [
            // [
            //     'param'    => 'post_type',
            //     'operator' => '==',
            //     'value'    => 'page',
            // ],
            [
                'param'    => 'page_template',
                'operator' => '==',
                'value'    => 'templates/configurator.php',
            ],
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-text-page.php',
            // ],
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-services.php',
            // ],
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-current-projects.php',
            // ],
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-reference-projects.php',
            // ],
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-apartments.php',
            // ],
            //
            // [
            //     'param'    => 'page_template',
            //     'operator' => '!=',
            //     'value'    => 'template-vacancies.php',
            // ],
        ],
        [
            [
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'sections',
            ],
        ],
    ],
    'menu_order'            => 1,
    'position'              => 'acf_after_title',
    'style'                 => 'default',
    'label_placement'       => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen'        => [
        0 => 'the_content',
        // 1 => 'excerpt',
    ],
    'active'                => true,
    'description'           => '',
];