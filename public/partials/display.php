<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 */

// Don't show if consent has already been given
if (isset($_COOKIE['bright_avg_cookie_consent'])) return;

// Checkmark SVG
function checkmarkContainer($additionalClass = '')
{
  return '
  <div class="c-cookie-notice-popup__category-icon-container ' . $additionalClass . '">
    <svg class="c-cookie-notice-popup__category-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M9 16.219l10.594-10.641 1.406 1.406-12 12-5.578-5.578 1.359-1.406z"></path>
    </svg>
  </div>
  ';
}

/**
 * Which checkboxes need to be checked? Which data attr?
 */
$analytics_checked = '';
$tracking_checked  = '';
$analytics_default = 'data-analytics="off"';
$tracking_default  = 'data-tracking="off"';
$necessary         = esc_attr(get_option('cookie_content_necessary'));
$analytics         = esc_attr(get_option('cookie_content_analytics'));
$tracking          = esc_attr(get_option('cookie_content_tracking'));

// Checked by default in Settings?
if ($analytics === 'default_on') {
  $analytics_checked = 'checked';
  $analytics_default = 'data-analytics="on"';
}
// Checked by default in Settings?
if ($tracking === 'default_on') {
  $tracking_checked = 'checked';
  $tracking_default = 'data-tracking="on"';
}

// Settings
$show_popup     = esc_attr(get_option('cookie_content_popup'));
$position       = esc_attr(get_option('cookie_content_position'));

// Notice texts
$popup_anchor   = esc_attr(get_option('cookie_content_popup_anchor'));
$content        = get_option('cookie_content_content');
$url            = esc_attr(get_option('cookie_content_link_url'));
$url_text       = esc_attr(get_option('cookie_content_link_text'));
$confirmation   = esc_attr(get_option('cookie_content_confirmation'));

// Popup texts
$popup_intro_title      = esc_attr(get_option('cookie_popup_intro_title'));
$popup_intro            = esc_attr(get_option('cookie_popup_intro'));
$popup_url              = esc_attr(get_option('cookie_popup_link_url'));
$popup_url_text         = esc_attr(get_option('cookie_popup_link_text'));
$popup_functional_title = esc_attr(get_option('cookie_popup_functional_title'));
$popup_functional       = esc_attr(get_option('cookie_popup_functional'));
$popup_analytics_title  = esc_attr(get_option('cookie_popup_analytics_title'));
$popup_analytics        = esc_attr(get_option('cookie_popup_analytics'));
$popup_tracking_title   = esc_attr(get_option('cookie_popup_tracking_title'));
$popup_tracking         = esc_attr(get_option('cookie_popup_tracking'));
$popup_confirmation     = esc_attr(get_option('cookie_popup_confirmation'));
$popup_confirmation_2   = esc_attr(get_option('cookie_popup_confirmation_2'));

if ($content === '') return;
?>

<div class="c-cookie-notice active js-cookie-notice c-cookie-notice--<?php echo $position; ?>" <?php echo $analytics_default . $tracking_default; ?>>

  <div class="c-cookie-notice__container">

    <div class="c-cookie-notice__info">
      <?php echo apply_filters('the_content', $content); ?> <?php if ($url) : ?><a href="<?php echo $url; ?>"><?php echo $url_text; ?></a><?php endif; ?>
    </div>

    <div class="c-cookie-notice__options">
      <div class="c-cookie-notice__accept js-confirm-all-cookies">
        <?php echo $confirmation; ?>
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

        <?php if ($popup_intro_title !== '') : ?>
          <div class="c-cookie-notice-popup__intro">
            <h3 class="c-cookie-notice-popup__title"><?php echo $popup_intro_title; ?></h3>
            <p><?php echo $popup_intro; ?> <?php if ($popup_url) : ?><a href="<?php echo $popup_url; ?>"><?php echo $popup_url_text; ?></a><?php endif; ?></p>
            <?php if ($popup_confirmation) : ?>
              <div class="c-cookie-notice-popup__accept js-cookie-notice-popup-button js-confirm-all-cookies"><?php echo $popup_confirmation; ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($necessary !== 'off') : ?>
          <div class="c-cookie-notice-popup__category">
            <div class="c-cookie-notice-popup__category-content">
              <h4 class="c-cookie-notice-popup__subtitle"><?php echo $popup_functional_title; ?></h4>
              <p><?php echo $popup_functional; ?></p>
            </div>

            <div class="c-cookie-notice-popup__category-choice">
              <?php echo checkmarkContainer(); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($analytics !== 'off') : ?>
          <div class="c-cookie-notice-popup__category">
            <div class="c-cookie-notice-popup__category-content">
              <h4 class="c-cookie-notice-popup__subtitle"><?php echo $popup_analytics_title; ?></h4>
              <p><?php echo $popup_analytics; ?></p>
            </div>

            <div class="c-cookie-notice-popup__category-choice">
              <?php
              if ($analytics === 'checkmark') :
                echo checkmarkContainer('js-cookie-checkmark-analytics');
              else :
              ?>
                <label class="c-cookie-notice-popup__switch">
                  <input type="checkbox" name="analytics" value="true" class="c-cookie-notice-popup__checkbox js-cookie-checkbox-analytics" <?php echo $analytics_checked; ?>>
                  <span class="c-cookie-notice-popup__slider"></span>
                </label>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($tracking !== 'off') : ?>
          <div class="c-cookie-notice-popup__category">
            <div class="c-cookie-notice-popup__category-content">
              <h4 class="c-cookie-notice-popup__subtitle"><?php echo $popup_tracking_title; ?></h4>
              <p><?php echo $popup_tracking; ?></p>
            </div>

            <div class="c-cookie-notice-popup__category-choice">
              <?php
              if ($tracking === 'checkmark') :
                echo checkmarkContainer('js-cookie-checkmark-tracking');
              else :
              ?>
                <label class="c-cookie-notice-popup__switch">
                  <input type="checkbox" name="tracking" value="true" class="c-cookie-notice-popup__checkbox js-cookie-checkbox-tracking" <?php echo $tracking_checked; ?>>
                  <span class="c-cookie-notice-popup__slider"></span>
                </label>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($popup_confirmation_2) : ?>
          <div class="c-cookie-notice-popup__outro">
            <div class="c-cookie-notice-popup__accept js-cookie-notice-popup-button js-confirm-cookie"><?php echo $popup_confirmation_2; ?></div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
<?php endif; ?>