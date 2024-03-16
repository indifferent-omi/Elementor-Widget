<?php

function add_sailr_widget_controls($widget) {
  
  for ($card = 1; $card <= 3; $card++) {
      // Start of Style Section for each Card
      $widget->start_controls_section(
          'style_section_card_' . $card,
          [
              'label' => sprintf(__('Card #%s Style', 'plugin-domain'), $card),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
      );

      // Add style controls for `pricing-card__title`
      // Example: Title Typography Control
      

      // Add other style controls for paragraph, price, and bottom text here...

      // End of Style Section
      $widget->end_controls_section();
  }


  for ($card = 1; $card <= 3; $card++) {
    $widget->start_controls_section(
          'card_' . $card,
          [
              'label' => sprintf(__('Card #%s', 'sailr-widget'), $card),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
      );

      // Title
      $widget->add_control(
          'title_' . $card,
          [
              'label' => __('Title', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('Title ' . $card, 'sailr-widget'),
              'placeholder' => __('Type your title here', 'sailr-widget'),
          ]
      );

      // Paragraph
      $widget->add_control(
          'paragraph_' . $card,
          [
              'label' => __('Paragraph', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'default' => __('This is a default paragraph.', 'sailr-widget'),
              'placeholder' => __('Type your paragraph here', 'sailr-widget'),
          ]
      );

      // Pricing
      $widget->add_control(
          'pricing_' . $card,
          [
              'label' => __('Pricing', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('$99', 'sailr-widget'),
              'placeholder' => __('Type the pricing here', 'sailr-widget'),
          ]
      );

      // Pricing Bottom Text
      $widget->add_control(
          'pricing_bottom_text_' . $card,
          [
              'label' => __('Pricing Bottom Text', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('per month', 'sailr-widget'),
              'placeholder' => __('Type the bottom text here', 'sailr-widget'),
          ]
      );

      // List Items
      $widget->add_control(
          'list_items_' . $card,
          [
              'label' => __('List Items', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'fields' => [
                  [
                      'name' => 'item_text',
                      'label' => __('Item Text', 'sailr-widget'),
                      'type' => \Elementor\Controls_Manager::TEXT,
                      'default' => __('List Item', 'sailr-widget'),
                      'label_block' => true,
                  ],
              ],
              'title_field' => '{{{ item_text }}}',
          ]
      );

      // Button Text
      $widget->add_control(
          'button_text_' . $card,
          [
              'label' => __('Button Text', 'sailr-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __('Click Me', 'sailr-widget'),
              'placeholder' => __('Type button text here', 'sailr-widget'),
          ]
      );

      $widget->end_controls_section();
  }
}