<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 */

// Don't show if consent has already been given
if (isset( $_COOKIE['bright_avg_cookie_consent'] )) return;

// Which checkboxes need to be checked?
$consent = (! empty($_COOKIE['bright_avg_cookie_consent']) ) ? $_COOKIE['bright_avg_cookie_consent'] : '';

$analytics_checked = '';
$tracking_checked  = '';
$necessary         = esc_attr( get_option('cookie_content_necessary') );
$tracking          = esc_attr( get_option('cookie_content_tracking') );
$analytics         = esc_attr( get_option('cookie_content_analytics') );

// Checked by default in Settings?
if ( $analytics === 'default_on' ) {
  $analytics_checked = 'checked';
}
if ( $tracking === 'default_on' ) {
  $tracking_checked = 'checked';
}
 
// Override the defaults with the consent set by user
if ( $consent === 'analytics_tracking' ) {
  $analytics_checked = 'checked';
  $tracking_checked = 'checked';
} elseif ( $consent === 'analytics' ) {
  $analytics_checked = 'checked';
  $tracking_checked = '';
} elseif ( $consent === 'tracking' ) {
  $tracking_checked = 'checked';
  $analytics_checked = '';
} elseif ( $consent === 'none' ) {
  $tracking_checked = '';
  $analytics_checked = '';
}

// Values
$show_popup   = esc_attr( get_option('cookie_content_popup') );
$popup_anchor = esc_attr( get_option('cookie_content_popup_anchor') );
$position     = esc_attr( get_option('cookie_content_position') );

function checkmarkContainer() {
  return '
  <div class="c-cookie-notice-popup__category-icon-container">
    <svg class="c-cookie-notice-popup__category-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M9 16.219l10.594-10.641 1.406 1.406-12 12-5.578-5.578 1.359-1.406z"></path>
    </svg>
  </div>
  ';
}
?>

<div class="c-cookie-notice active js-cookie-notice c-cookie-notice--<?php echo $position; ?>">

  <div class="c-cookie-notice__container">

    <div class="c-cookie-notice__info">
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <a href="#">Read more</a></p>
    </div>

    <div class="c-cookie-notice__options">
      <div class="c-cookie-notice__accept js-confirm-cookie">
        Cookies accepteren
        <svg class="c-cookie-notice__accept-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
          <path d="M9 16.219l10.594-10.641 1.406 1.406-12 12-5.578-5.578 1.359-1.406z"></path>
        </svg>
      </div>

      <?php if ($show_popup === 'on') : ?>
        <div class="c-cookie-notice__manage js-cookie-notice-popup-open"><?php echo $popup_anchor; ?></div>
      <?php endif; ?>
    </div>

  </div>

</div>

<?php if ($show_popup === 'on') : ?>
  <div class="c-cookie-notice-popup js-cookie-notice-popup">
    <div class="c-cookie-notice-popup__container js-cookie-notice-popup-container">

      <div class="c-cookie-notice-popup__closer js-cookie-notice-popup-button">
        <span></span>
        <span></span>
      </div>

      <div class="c-cookie-notice-popup__content">

        <div class="c-cookie-notice-popup__intro">
          <h3 class="c-cookie-notice-popup__title">We value your privacy</h3>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a href="#">Read more</a></p>
          <div class="c-cookie-notice-popup__accept js-cookie-notice-popup-button js-confirm-cookie">Cookies accepteren</div>
        </div>

        <?php if ($necessary !== 'off') : ?>
        <div class="c-cookie-notice-popup__category">
          <div class="c-cookie-notice-popup__category-content">
            <h4 class="c-cookie-notice-popup__subtitle">Functionele cookies</h4>
            <p>Necessary cookies enable core functionality. The website cannot function with them.</p>
          </div>

          <div class="c-cookie-notice-popup__category-choice">
            <?php echo checkmarkContainer(); ?>
          </div>
        </div>
        <?php endif; ?>
        
        <?php if ($analytics !== 'off') : ?>
        <div class="c-cookie-notice-popup__category">
          <div class="c-cookie-notice-popup__category-content">
            <h4 class="c-cookie-notice-popup__subtitle">Analytische cookies</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
          </div>

          <div class="c-cookie-notice-popup__category-choice">
            <?php 
            if ($analytics === 'checkmark') :
              echo checkmarkContainer();
            else : 
            ?>
            <label class="c-cookie-notice-popup__switch">
              <input type="checkbox" name="analytics" value="true" class="c-cookie-notice-popup__checkbox js-cookie-checkbox" <?php echo $analytics_checked; ?>>
              <span class="c-cookie-notice-popup__slider"></span>
            </label>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        
        <?php if ($tracking !== 'off') : ?>
        <div class="c-cookie-notice-popup__category">
          <div class="c-cookie-notice-popup__category-content">
            <h4 class="c-cookie-notice-popup__subtitle">Tracking cookies</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
          </div>

          <div class="c-cookie-notice-popup__category-choice">
            <?php 
            if ($tracking === 'checkmark') :
              echo checkmarkContainer();
            else : 
            ?>
            <label class="c-cookie-notice-popup__switch">
              <input type="checkbox" name="tracking" value="true" class="c-cookie-notice-popup__checkbox js-cookie-checkbox" <?php echo $tracking_checked; ?>>
              <span class="c-cookie-notice-popup__slider"></span>
            </label>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        
        <div class="c-cookie-notice-popup__outro">
          <div class="c-cookie-notice-popup__accept js-cookie-notice-popup-button js-confirm-cookie">Cookie instellingen opslaan</div>
        </div>
      </div>

    </div>
  </div>
<?php endif; ?>