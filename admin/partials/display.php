<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 */
?>

<div class="wrap">

  <!-- Intro -->
  <h1>Bright Cookie Notice</h1>
  <p>Met de onderstaande instellingen kunnen de instellingen, stijl en content voor de cookiemelding bepaald worden.</p>

  <!-- Form -->
  <form method="post" action="options.php">

    <?php
    settings_fields( 'bright-cookie-notice-settings' );
    do_settings_sections( 'bright-cookie-notice-settings' );
    ?>

    <!-- Settings -->
    <h2 class="title">Instellingen</h2>
    <hr/>

    <table class="form-table">
      <tbody>

        <tr>
          <th scope="row">Stylesheet
          </th>
          <td>
            <select name="cookie_content_stylesheet">
              <option value="max">Volledig</option>
              <option value="mini">Minimum (alleen .active)</option>
            </select>
          </td>
        </tr>

        <tr>
          <th scope="row">Cookiemelding positie
          </th>
          <td>
            <select name="cookie_content_position">
              <option value="fixed-top" <?php echo esc_attr( get_option('cookie_content_position') ) == 'fixed-top' ? 'selected="selected"' : ''; ?>>Meescrollen - Boven</option>
              <option value="fixed-bottom" <?php echo esc_attr( get_option('cookie_content_position') ) == 'fixed-bottom' ? 'selected="selected"' : ''; ?>>Meescrollen - Onder</option>
              <option value="relative" <?php echo esc_attr( get_option('cookie_content_position') ) == 'relative' ? 'selected="selected"' : ''; ?>>Relatief</option>
            </select>
            <p class="description">Vergeet niet de functie blabla...</p>
          </td>
        </tr>

        <tr>
          <th scope="row">Popup
          </th>
          <td>
            <fieldset>
              <label for="popup">
                <input name="cookie_content_popup" type="checkbox" id="popup" <?php echo esc_attr( get_option('cookie_content_popup') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Een popup met instellingen tonen
              </label>
            </fieldset>
            <br/>
            <label>
              Link tekst:
              <input type="text" name="cookie_content_popup_anchor" placeholder="Voorkeuren beheren" class="regular-text" value="<?php echo esc_attr( get_option('cookie_content_popup_anchor') ); ?>" />
            </label>
          </td>
        </tr>

        <tr>
          <th scope="row">Noodzakelijke cookies
          </th>
          <td>
            <fieldset>
              <label for="necessary">
                <input name="cookie_content_necessary" type="checkbox" id="necessary" <?php echo esc_attr( get_option('cookie_content_necessary') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Als optie tonen
              </label>
            </fieldset>
            <p class="description">Noodzakelijke cookies staan altijd aan.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">Analytische cookies
          </th>
          <td>
            <fieldset>
              <label for="analytics">
                <input name="cookie_content_analytics" type="checkbox" id="analytics" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Als optie tonen
              </label>
            </fieldset>
            <fieldset>
              <label for="analytics_default">
                <input name="cookie_content_analytics_default" type="checkbox" id="analytics_default" <?php echo esc_attr( get_option('cookie_content_analytics_default') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Standaard aangevinkt
              </label>
            </fieldset>
          </td>
        </tr>

        <tr>
          <th scope="row">Tracking cookies
          </th>
          <td>
            <fieldset>
              <label for="tracking">
                <input name="cookie_content_tracking" type="checkbox" id="tracking" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Als optie tonen
              </label>
            </fieldset>
            <fieldset>
              <label for="tracking_default">
                <input name="cookie_content_tracking_default" type="checkbox" id="tracking_default" <?php echo esc_attr( get_option('cookie_content_tracking_default') ) == 'on' ? 'checked="checked"' : ''; ?>>
                Standaard aangevinkt
              </label>
            </fieldset>
          </td>
        </tr>

      </tbody>
    </table>

    <!-- Notice -->
    <!-- <h2 class="title">Notice</h2>
    <hr/>

    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="content">Tekstvlak</label>
          </th>
          <td>
            <textarea name="cookie_content_content" id="content" rows="5" class="regular-text">Temp</textarea>
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="anchor">Beleid button: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_content_anchor" id="anchor" value="Temp" class="regular-text" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="link">Beleid button: link</label>
          </th>
          <td>
            <input type="text" name="cookie_content_link" id="link" value="Temp" class="regular-text" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="popup_anchor">Popup button: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_content_popup_anchor" id="popup_anchor" value="Temp" class="regular-text" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="popup_link">Popup button: link</label>
          </th>
          <td>
            <input type="text" name="cookie_content_popup_link" id="popup_link" value="Temp" class="regular-text" />
          </td>
        </tr>

      </tbody>
    </table> -->

    <!-- Popup -->
    <!-- <h2 class="title">Popup</h2> -->
    <!-- <hr/> -->

    <!-- Submit -->
    <?php submit_button(); ?>

  </form>

</div>