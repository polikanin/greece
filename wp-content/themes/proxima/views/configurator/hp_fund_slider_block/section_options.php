<?php

return [
    'label' => __('Fund Slider Block', 'proxima'),
    'key' => basename(__DIR__),
    'tab_demo_preview' => [
        'key' => 'field_auto_key', // $section->field_auto_key(),
        'type' => 'message',
        'message' => 'Fund Slider Block', // marck_section_demo_preview( $section->key ),
        'new_lines' => 'wpautop',
        'esc_html' => 0,
    ],

    'tab_content' => [
        array(
            'key' => 'field_663a15e09802b',
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
            'rows' => 6,
            'new_lines' => 'br',
        ),
        array(
            'key' => 'field_663a15f19802c',
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
            'rows' => 6,
            'new_lines' => 'br',
        ),
        array(
            'key' => 'field_663a16089802d',
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
        array(
            'key' => 'field_663a16449802f',
            'label' => 'Label',
            'name' => 'label',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_663a256a555f8',
            'label' => 'Mobile Label',
            'name' => 'sm_label',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_663a161e9802e',
            'label' => 'Slider',
            'name' => 'slider',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'layouts' => array(
                'layout_663a162828970' => array(
                    'key' => 'layout_663a162828970',
                    'name' => 'slide',
                    'label' => 'Slide',
                    'display' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_663a164998030',
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
                            'rows' => 3,
                            'new_lines' => 'br',
                        ),
                        array(
                            'key' => 'field_663a165698031',
                            'label' => 'Subtitle',
                            'name' => 'subtitle',
                            'type' => 'text',
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
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_663a165d98032',
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
                            'rows' => 3,
                            'new_lines' => 'br',
                        ),
                        array(
                            'key' => 'field_663a167698033',
                            'label' => 'Points',
                            'name' => 'points',
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
                                    'key' => 'field_663a168298034',
                                    'label' => 'Title',
                                    'name' => 'title',
                                    'type' => 'text',
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
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                                array(
                                    'key' => 'field_663a168798035',
                                    'label' => 'Value',
                                    'name' => 'value',
                                    'type' => 'text',
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
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                            ),
                        ),
                    ),
                    'min' => '',
                    'max' => '',
                ),
            ),
            'button_label' => 'Add Row',
            'min' => '',
            'max' => '',
        ),
    ],

    'tab_options' => [],
    /**/
];