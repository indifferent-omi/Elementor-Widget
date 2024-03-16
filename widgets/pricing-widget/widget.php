<?php
require_once 'basic-controls.php';
require_once 'style-controls.php';

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

  public function get_style_depends() {
    wp_enqueue_style( 'sailr-widget-style', plugins_url( 'style.css', __FILE__ ) );
      return [ 'sailr-widget-style' ];
    }
  public function get_icon()
  {
    return 'eicon-price-table';
  }

  public function get_categories()
  {
    return ['general'];
  }

  protected function register_controls() {

    add_pricing_basic_controls($this);
    add_pricing_style_controls($this);
    
  }


protected function render() {
  $settings = $this->get_settings_for_display();

  $dark_mode_class = $settings['price_card_active'];

  echo '<div class="pricing-card ' . esc_attr($dark_mode_class) . '">';

      echo '<h3 class="pricing-card__title">' . esc_html($settings['title']) . '</h3>';
      echo '<p class="pricing-card__paragraph">' . esc_html($settings['paragraph']) . '</p>';
      echo '<div class="pricing-card__pricing-block">';
      echo '<span class="pricing-card__price">' . esc_html($settings['pricing']) . '<span class="pricing-card__price-ext">' . esc_html($settings['price_ext']) . '</span>'. '</span>';
      echo '<div class="pricing-card__price-bottom-text">';
      foreach ($settings['pricing_bottom_texts'] as $text) {
        echo '<p class="pricing-card__bottom-text">' . esc_html($text['item_text']) . '</p>';
      }
      echo '</div>';
      echo '</div>';
      echo '<ul class="pricing-card__list">';
      foreach ($settings['list_items'] as $item) {
          echo '<li>' . esc_html($item['item_text']) . '</li>';
      }
      echo '</ul>';
      echo '<button class="pricing-card__button">' . esc_html($settings['button_text']) . '</button>';
      echo '</div>'; // .pricing-card
}


protected function _content_template() {
  ?>
  <div class="pricing-card {{ settings.price_card_active }}">
      <h3 class="pricing-card__title">{{{ settings.title }}}</h3>
      <p class="pricing-card__paragraph">{{{ settings.paragraph }}}</p>
      <div class="pricing-card__pricing-block">
          <span class="pricing-card__price">{{{ settings.pricing }}}<span class="pricing-card__price-ext">{{{ settings.price_ext }}}</span></span>
          <div class="pricing-card__price-bottom-text">
              <# _.each( settings.pricing_bottom_texts, function( text ) { #>
                  <p class="pricing-card__bottom-text">{{{ text.item_text }}}</p>
              <# }); #>
          </div>
      </div>
      <ul class="pricing-card__list">
          <# _.each( settings.list_items, function( item ) { #>
              <li>{{{ item.item_text }}}</li>
          <# }); #>
      </ul>
      <button class="pricing-card__button">{{{ settings.button_text }}}</button>
  </div>
  <?php
}

}
