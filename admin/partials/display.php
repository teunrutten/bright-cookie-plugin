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

  <h2 class="title">Werking</h2>
  <hr/>
  <p>Plaats deze code waar je wilt dat de cookiemelding verschijnt:</p>

  <code>
  if (class_exists('Bright_Cookie_Notice') ) {
    $cookie_notice = new Bright_Cookie_Notice();
    $cookie_notice->get_display();
  }
  </code>

  <!-- Form -->
  <form method="post" action="options.php">

    <?php
    settings_fields( 'bright-cookie-notice-settings' );
    do_settings_sections( 'bright-cookie-notice-settings' );
    ?>

    <!-- Settings -->
    <br/>
    <h2 class="title">Instellingen</h2>
    <hr/>

    <table class="form-table">
      <tbody>

        <tr>
          <th scope="row">Stylesheets
          </th>
          <td>
            <select name="cookie_content_stylesheet">
              <option value="max" <?php echo esc_attr( get_option('cookie_content_stylesheet') ) == 'max' ? 'selected="selected"' : ''; ?>>Alles laden</option>
              <option value="mini" <?php echo esc_attr( get_option('cookie_content_stylesheet') ) == 'mini' ? 'selected="selected"' : ''; ?>>Minimum styles laden</option>
              <option value="none" <?php echo esc_attr( get_option('cookie_content_stylesheet') ) == 'none' ? 'selected="selected"' : ''; ?>>Geen stylesheet laden</option>
            </select>
          </td>
        </tr>

        <tr>
          <th scope="row">Scripts
          </th>
          <td>
            <select name="cookie_content_scripts">
              <option value="max" <?php echo esc_attr( get_option('cookie_content_scripts') ) == 'max' ? 'selected="selected"' : ''; ?>>Alles laden</option>
              <option value="mini" <?php echo esc_attr( get_option('cookie_content_scripts') ) == 'mini' ? 'selected="selected"' : ''; ?>>Geen popup code laden</option>
              <option value="none" <?php echo esc_attr( get_option('cookie_content_scripts') ) == 'none' ? 'selected="selected"' : ''; ?>>Geen script laden</option>
            </select>

            <br /><br />
            <fieldset>
              <label for="js-cookie">
                <input type="checkbox" name="cookie_content_cookie_script" id="js-cookie" <?php echo esc_attr( get_option('cookie_content_cookie_script') ) == 'on' ? 'checked' : ''; ?> />
                js-cookie CDN laden
              </label>
            </fieldset>
          </td>
        </tr>

        <tr>
          <th scope="row">Cookiemelding positie
          </th>
          <td>
            <select name="cookie_content_position">
              <option value="fixed-bottom" <?php echo esc_attr( get_option('cookie_content_position') ) == 'fixed-bottom' ? 'selected="selected"' : ''; ?>>Meescrollen - Onderaan de pagina</option>
              <option value="fixed-top" <?php echo esc_attr( get_option('cookie_content_position') ) == 'fixed-top' ? 'selected="selected"' : ''; ?>>Meescrollen - Bovenaan de pagina</option>
              <option value="relative" <?php echo esc_attr( get_option('cookie_content_position') ) == 'relative' ? 'selected="selected"' : ''; ?>>Relatief</option>
            </select>
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
            <select name="cookie_content_necessary">
              <option value="checkmark" <?php echo esc_attr( get_option('cookie_content_necessary') ) == 'checkmark' ? 'selected="selected"' : ''; ?>>Vinkje</option>
              <option value="off" <?php echo esc_attr( get_option('cookie_content_necessary') ) == 'off' ? 'selected="selected"' : ''; ?>>Niet tonen als optie</option>
            </select>
            <p class="description">Noodzakelijke cookies hebben geen toestemming nodig.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">Analytische cookies
          </th>
          <td>
            <select name="cookie_content_analytics">
              <option value="default_off" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'default_off' ? 'selected="selected"' : ''; ?>>Uitgevinkt</option>
              <option value="default_on" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'default_on' ? 'selected="selected"' : ''; ?>>Aangevinkt</option>
              <option value="checkmark" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'checkmark' ? 'selected="selected"' : ''; ?>>Vinkje</option>
              <option value="off" <?php echo esc_attr( get_option('cookie_content_analytics') ) == 'off' ? 'selected="selected"' : ''; ?>>Niet tonen als optie</option>
            </select>
            <p class="description">'Vinkje' en 'Niet tonen als optie' worden opgeslagen als toestemming.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">Tracking cookies
          </th>
          <td>
            <select name="cookie_content_tracking">
              <option value="default_off" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'default_off' ? 'selected="selected"' : ''; ?>>Uitgevinkt</option>
              <option value="default_on" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'default_on' ? 'selected="selected"' : ''; ?>>Aangevinkt</option>
              <option value="checkmark" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'checkmark' ? 'selected="selected"' : ''; ?>>Vinkje</option>
              <option value="off" <?php echo esc_attr( get_option('cookie_content_tracking') ) == 'off' ? 'selected="selected"' : ''; ?>>Niet tonen als optie</option>
            </select>
            <p class="description">'Vinkje' en 'Niet tonen als optie' worden opgeslagen als toestemming.</p>
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