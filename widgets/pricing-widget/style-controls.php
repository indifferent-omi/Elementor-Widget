<?php

function add_pricing_style_controls($widget) {
  $widget->start_controls_section(
    'style_section_card',
    [
        'label' => __('Card Style', 'sailr-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
  );
  $widget->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'content_typography',
        'label' => __('Title', 'sailr-widget'),
        'selector' => '{{WRAPPER}} .pricing-card__title'
    ]
    );
  // Add style controls for `pricing-card__title`
  // Example: Title Typography Control


  // Add other style controls for paragraph, price, and bottom text here...

  // End of Style Section
  $widget->end_controls_section();
}