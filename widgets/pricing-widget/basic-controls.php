<?php

function add_pricing_basic_controls($widget) {
  $widget->start_controls_section(
    'card' ,
    [
        'label' => __('Card', 'sailr-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$widget->add_control(
    'primary_color',
    [
        'label' => __('Primary Color', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '', // Default primary color
        'selectors' => [
            '{{WRAPPER}} .pricing-card' => '--sPricingPrimary: {{VALUE}};', // Example for text color
        ],
    ]
);

// Secondary Color Control
$widget->add_control(
    'secondary_color',
    [
        'label' => __('Primary Color', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '', // Default primary color
        'selectors' => [
            '{{WRAPPER}} .pricing-card' => '--sPricingSecondary: {{VALUE}};', // Example for text color
        ],
    ]
);

$widget->add_control(
    'price_card_active',
    [
        'label' => __('Active Card', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __('Yes', 'sailr-widget'),
        'label_off' => __('No', 'sailr-widget'),
        'return_value' => 'active', // The value that is returned when the switcher is "on"
        'default' => 'No',
    ]
);
// Title
$widget->add_control(
    'title' ,
    [
        'label' => __('Title', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Title ' , 'sailr-widget'),
        'placeholder' => __('Type your title here', 'sailr-widget'),
    ]
);

// Paragraph
$widget->add_control(
    'paragraph',
    [
        'label' => __('Paragraph', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('This is a default paragraph.', 'sailr-widget'),
        'placeholder' => __('Type your paragraph here', 'sailr-widget'),
    ]
);

// Pricing
$widget->add_control(
    'pricing',
    [
        'label' => __('Pricing', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('$99', 'sailr-widget'),
        'placeholder' => __('Type the pricing here', 'sailr-widget'),
    ]
);
$widget->add_control(
    'price_ext',
    [
        'label' => __('Price Ext', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('/month', 'sailr-widget'),
        'placeholder' => __('ex: /month , /mo , /year', 'sailr-widget'),
    ]
);

// Pricing Bottom Text
$repeater1 = new \Elementor\Repeater();
$repeater1->add_control(
    'item_text', // Control ID
    [
        'label' => __('Item Text', 'text-domain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Default Item', 'text-domain'),
        'dynamic' => [
            'active' => true,
        ],
        'label_block' => true,
    ]
);
$widget->add_control(
    'pricing_bottom_texts',
    [
        'label' => __('Pricing Block Paragraphs', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
            [
                'name' => 'item_text',
                'label' => __('Item Text', 'sailr-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Pricing Block Texts', 'sailr-widget'),
                'label_block' => true,
            ],
        ],
        'default' => [
            [
                'item_text' => __('(20 Target Keywords)', 'sailr-widget'),
            ],
            [
                'item_text' => __('Pause or cancel anytime', 'sailr-widget'),
            ],
            // Add more default items as needed
        ],
        'title_field' => '{{{ item_text }}}',
    ]
);

// List Items

$repeater = new \Elementor\Repeater();

$repeater->add_control(
    'item_text', // Control ID
    [
        'label' => __('Item Text', 'text-domain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Default Item', 'text-domain'),
        'dynamic' => [
            'active' => true,
        ],
        'label_block' => true,
    ]
);
// $widget->add_control(
//     'list_items',
//     [
//         'label' => __('List Items', 'sailr-widget'),
//         'type' => \Elementor\Controls_Manager::REPEATER,
//         'fields' => [
//             [
//                 'name' => 'item_text',
//                 'label' => __('Item Text', 'sailr-widget'),
//                 'type' => \Elementor\Controls_Manager::TEXT,
//                 'default' => __('List Item', 'sailr-widget'),
//                 'label_block' => true,
//                 'default' => [
//                     [
//                         'item_text' => __('Default Item 1', 'text-domain'),
//                     ],
//                     [
//                         'item_text' => __('Default Item 2', 'text-domain'),
//                     ],
//                     // Add more default items as needed
//                 ],
//             ],
//         ],
//         'title_field' => '{{{ item_text }}}',
//     ]
// );

  // Add default list items
  $widget->add_control(
    'list_items',
    [
        'label' => __('List Items', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
            [
                'item_text' => __('Default Item 1', 'sailr-widget'),
            ],
            [
                'item_text' => __('Default Item 2', 'sailr-widget'),
            ],
            // Add more default items as needed
        ],
        'title_field' => '{{{ item_text }}}',
    ]
);

// Button Text
$widget->add_control(
    'button_text',
    [
        'label' => __('Button Text', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Click Me', 'sailr-widget'),
        'placeholder' => __('Type button text here', 'sailr-widget'),
    ]
);

$widget->end_controls_section();
}