<?php
// require_once __DIR__ . '/controls/sailr-widget-controls.php';

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

  protected function register_controls() {

    add_sailr_widget_controls($this);
    
  }


protected function render() {
  $settings = $this->get_settings_for_display();

      echo '<div class="pricing-card">';
      echo '<h3 class="pricing-card__title">' . esc_html($settings['title_' . $card]) . '</h3>';
      echo '<p class="pricing-card__paragraph">' . esc_html($settings['paragraph_' . $card]) . '</p>';
      echo '<div class="pricing-block">';
      echo '<span class="pricing-card__price">' . esc_html($settings['pricing_' . $card]) . '</span>';
      echo '<p class="pricing-card__bottom-text">' . esc_html($settings['pricing_bottom_text_' . $card]) . '</p>';
      echo '</div>';
      echo '<ul class="pricing-card__list">';
      foreach ($settings['list_items_' . $card] as $item) {
          echo '<li>' . esc_html($item['item_text']) . '</li>';
      }
      echo '</ul>';
      echo '<button class="pricing-card__button">' . esc_html($settings['button_text_' . $card]) . '</button>';
      echo '</div>'; // .pricing-card
}


  protected function _content_template()
  {
  ?>
    <#
    // Use the settings variable to access widget settings
    function printList(items) {
        if(_.isEmpty(items)) {
            return;
        }
        _.each(items, function(item) {
            print('<li>' + item.item_text + '</li>');
        });
    }
    #>
    <div class="pricing-card-row">
        <# for ( var card = 1; card <= 3; card++ ) { #>
            <div class="pricing-card">
                <h3 class="pricing-card__title">{{{ settings['title_' + card] }}}</h3>
                <p class="pricing-card__paragraph">{{{ settings['paragraph_' + card] }}}</p>
                <div class="pricing-block">
                    <span class="pricing-card__price">{{{ settings['pricing_' + card] }}}</span>
                    <p class="pricing-card__bottom-text">{{{ settings['pricing_bottom_text_' + card] }}}</p>
                </div>
                <ul class="pricing-card__list">
                    <# printList(settings['list_items_' + card]); #>
                </ul>
                <button class="pricing-card__button">{{{ settings['button_text_' + card] }}}</button>
            </div>
        <# } #>
    </div>
  <?php
  }
}
