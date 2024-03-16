<?php
class Sailr_Widget extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'sailr-widget';
  }

  public function get_title()
  {
    return __('Sailr Pricing Widget', 'sailr-widget');
  }

  public function get_icon()
  {
    return 'eicon-price-table';
  }

  public function get_categories()
  {
    return ['general'];
  }

  protected function _register_controls()
  {

    $this->start_controls_section(
      'cards_section',
      [
        'label' => __('Cards', 'sailr-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Card Title
    $this->add_control(
      'card_title',
      [
        'label' => __('Card Title', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Card Title', 'sailr-widget'),
        'placeholder' => __('Enter your title', 'sailr-widget'),
      ]
    );

    // Card Paragraph
    $this->add_control(
      'card_paragraph',
      [
        'label' => __('Card Paragraph', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('This is a default paragraph.', 'sailr-widget'),
        'placeholder' => __('Enter your paragraph', 'sailr-widget'),
      ]
    );

    // Card Pricing
    $this->add_control(
      'card_pricing',
      [
        'label' => __('Card Pricing', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('$99.99', 'sailr-widget'),
        'placeholder' => __('Enter pricing', 'sailr-widget'),
      ]
    );

    // Card Pricing Bottom Text
    $this->add_control(
      'card_pricing_bottom_text',
      [
        'label' => __('Pricing Bottom Text', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Per Month', 'sailr-widget'),
        'placeholder' => __('Additional pricing info', 'sailr-widget'),
      ]
    );

    // Card List
    $this->add_control(
      'card_list',
      [
        'label' => __('List Items', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'list_item',
            'label' => __('List Item', 'sailr-widget'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('List Item', 'sailr-widget'),
            'label_block' => true,
          ],
        ],
        'title_field' => '{{{ list_item }}}',
      ]
    );

    // Card Button Text
    $this->add_control(
      'card_button_text',
      [
        'label' => __('Button Text', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Learn More', 'sailr-widget'),
        'placeholder' => __('Enter button text', 'sailr-widget'),
      ]
    );

    // Card Button Link
    $this->add_control(
      'card_button_link',
      [
        'label' => __('Button Link', 'sailr-widget'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __('https://your-link.com', 'sailr-widget'),
        'show_external' => true,
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    // PHP rendering of your widget's frontend

    $settings = $this->get_settings_for_display();
?>
    <div class="pricing-card-row">
      <div class="pricing-card">
        <h3 class="pricing-card__title"><?php echo esc_html($settings['title']); ?></h3>
        <p class="pricing-card__paragraph"><?php echo esc_html($settings['paragraph']); ?></p>
        <div class="pricing-block">
          <span class="pricing-card__price"><?php echo esc_html($settings['pricing']); ?></span>
          <p class="pricing-card__bottom-text"><?php echo esc_html($settings['pricing_bottom_text']); ?></p>
        </div>
        <ul class="pricing-card__list">
          <?php foreach ($settings['list_items'] as $item) : ?>
            <li><?php echo esc_html($item['item_text']); ?></li>
          <?php endforeach; ?>
        </ul>
        <button class="pricing-card__button"><?php echo esc_html($settings['button_text']); ?></button>
      </div>
      <div class="pricing-card">
        <h3 class="pricing-card__title"><?php echo esc_html($settings['title']); ?></h3>
        <p class="pricing-card__paragraph"><?php echo esc_html($settings['paragraph']); ?></p>
        <div class="pricing-block">
          <span class="pricing-card__price"><?php echo esc_html($settings['pricing']); ?></span>
          <p class="pricing-card__bottom-text"><?php echo esc_html($settings['pricing_bottom_text']); ?></p>
        </div>
        <ul class="pricing-card__list">
          <?php foreach ($settings['list_items'] as $item) : ?>
            <li><?php echo esc_html($item['item_text']); ?></li>
          <?php endforeach; ?>
        </ul>
        <button class="pricing-card__button"><?php echo esc_html($settings['button_text']); ?></button>
      </div>
      <div class="pricing-card">
        <h3 class="pricing-card__title"><?php echo esc_html($settings['title']); ?></h3>
        <p class="pricing-card__paragraph"><?php echo esc_html($settings['paragraph']); ?></p>
        <div class="pricing-block">
          <span class="pricing-card__price"><?php echo esc_html($settings['pricing']); ?></span>
          <p class="pricing-card__bottom-text"><?php echo esc_html($settings['pricing_bottom_text']); ?></p>
        </div>
        <ul class="pricing-card__list">
          <?php foreach ($settings['list_items'] as $item) : ?>
            <li><?php echo esc_html($item['item_text']); ?></li>
          <?php endforeach; ?>
        </ul>
        <button class="pricing-card__button"><?php echo esc_html($settings['button_text']); ?></button>
      </div>
    </div>
  <?php
  }

  protected function _content_template()
  {
  ?>
    <# // JS template for live preview #>
      <div class="pricing-table">
        <div class="pricing-header">
          <h3>{{{ settings.title }}}</h3>
          <!-- Output more settings like price, features here -->
        </div>
      </div>
  <?php
  }
}
