<?php

$sections = [
    [
        'prefix' => 'hp_',

        'sections' => [
            'hp_hello_block',
            'hp_advantages_block',
            'hp_advantages_slider_block',
            'hp_vertical_slider_block',
            'hp_program_block',
            'hp_definition_block',
            'hp_investments_block',
            'hp_investments_small_block',
            'hp_options_block',
            'hp_highlights_block',
            'hp_highlights_slider_block',
            'hp_fund_slider_block',
            'hp_fund_steps_block',
            'hp_new_steps_block',
            'hp_bg_text_block',
            'hp_testimonials_block',
            'hp_steps_block',
            'hp_successful_block',
            'hp_4_items_block',
            'hp_linear_slider_block',
            'hp_faq_block',
            'hp_about_block',
            'hp_x3_slider_block',
            'hp_terms_block',
            'hp_compare_block',
            'hp_requirements_block',
            'hp_timelines_block',
            'hp_government_block',
            'hp_fees_block',
            'hp_law_block',
            'hp_form_block',
            'hp_news_block',
        ],

        'location' => [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'templates/hp_configurator.php',
                ],
            ],

            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'sections',
                ]
            ],
        ],
    ],

    [
        'prefix' => 'cp_',

        'sections' => [
        ],

        'location' => [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'template/contact.php',
                ]
            ],

            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'sections',
                ]
            ]
        ]
    ],
];

return $sections;
