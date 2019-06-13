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

  <br/><br/>
  <p>Je kan bezoekers hun instellingen laten wijzigen. De link moet de volgende class bevatten: <code>js-delete-cookies</code></p>

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
            <p class="description">'Vinkje' wordt opgeslagen als toestemming.</p>
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
            <p class="description">'Vinkje' wordt opgeslagen als toestemming.</p>
          </td>
        </tr>

      </tbody>
    </table>

    <!-- Notice -->
    <h2 class="title">Cookiemelding teksten</h2>
    <hr/>

    <table class="form-table">
      <tbody>
        
        <tr>
          <th scope="row">
            <label for="cookie_content_content">Tekstvlak</label>
          </th>
          <td>
            <textarea name="cookie_content_content" id="content" rows="5" class="regular-text" placeholder="Deze website gebruikt cookies..."><?php echo esc_attr( get_option('cookie_content_content') ); ?></textarea>
            <p class="description">Laat leeg om cookiemelding te tonen.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_content_confirmation">Bevestigingsbutton: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_content_confirmation" id="cookie_content_confirmation" class="regular-text" placeholder="Cookies accepteren" value="<?php echo esc_attr( get_option('cookie_content_confirmation') ); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_content_link_url">Cookiebeleidpagina: link</label>
          </th>
          <td>
            <input type="text" name="cookie_content_link_url" id="cookie_content_link_url" class="regular-text" placeholder="/cookiebeleid" value="<?php echo esc_attr( get_option('cookie_content_link_url') ); ?>" />
            <p class="description">Laat leeg om geen link te tonen.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_content_link_text">Cookiebeleidpagina: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_content_link_text" id="cookie_content_link_text" class="regular-text" placeholder="Meer informatie" value="<?php echo esc_attr( get_option('cookie_content_link_text') ); ?>" />
          </td>
        </tr>

      </tbody>
    </table>

    <!-- Popup -->
    <h2 class="title">Popup teksten</h2>
    <hr/>

    <table class="form-table">
      <tbody>

        <tr>
          <th scope="row">
            <label for="cookie_popup_intro_title">Introductie: titel</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_intro_title" id="cookie_popup_intro_title" class="regular-text" placeholder="Wij respecteren uw privacy" value="<?php echo esc_attr( get_option('cookie_popup_intro_title') ); ?>" />
            <p class="description">Laat leeg om geen introductie gedeelte te tonen.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_intro">Introductie: tekst</label>
          </th>
          <td>
            <textarea name="cookie_popup_intro" id="content" rows="5" class="regular-text" placeholder="Lorem ipsum dolor sit amet..."><?php echo esc_attr( get_option('cookie_popup_intro') ); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_link_url">Cookiebeleidpagina: link</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_link_url" id="cookie_popup_link_url" class="regular-text" placeholder="/cookiebeleid" value="<?php echo esc_attr( get_option('cookie_popup_link_url') ); ?>" />
            <p class="description">Laat leeg om geen link te tonen.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_link_text">Cookiebeleidpagina: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_link_text" id="cookie_popup_link_text" class="regular-text" placeholder="Meer informatie" value="<?php echo esc_attr( get_option('cookie_popup_link_text') ); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_functional_title">Functioneel: titel</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_functional_title" id="cookie_popup_functional_title" class="regular-text" placeholder="Functionele cookies" value="<?php echo esc_attr( get_option('cookie_popup_functional_title') ); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_functional">Functioneel: tekst</label>
          </th>
          <td>
            <textarea name="cookie_popup_functional" id="content" rows="5" class="regular-text" placeholder="Lorem ipsum dolor sit amet..."><?php echo esc_attr( get_option('cookie_popup_functional') ); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_analytics_title">Analytisch: titel</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_analytics_title" id="cookie_popup_analytics_title" class="regular-text" placeholder="Analytische cookies" value="<?php echo esc_attr( get_option('cookie_popup_analytics_title') ); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_analytics">Analytisch: tekst</label>
          </th>
          <td>
            <textarea name="cookie_popup_analytics" id="content" rows="5" class="regular-text" placeholder="Lorem ipsum dolor sit amet..."><?php echo esc_attr( get_option('cookie_popup_analytics') ); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_tracking_title">Tracking: titel</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_tracking_title" id="cookie_popup_tracking_title" class="regular-text" placeholder="Tracking cookies" value="<?php echo esc_attr( get_option('cookie_popup_tracking_title') ); ?>" />
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_tracking">Tracking: tekst</label>
          </th>
          <td>
            <textarea name="cookie_popup_tracking" id="content" rows="5" class="regular-text" placeholder="Lorem ipsum dolor sit amet..."><?php echo esc_attr( get_option('cookie_popup_tracking') ); ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_confirmation">Bevestigingsbutton #1: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_confirmation" id="cookie_popup_confirmation" class="regular-text" placeholder="Cookies accepteren" value="<?php echo esc_attr( get_option('cookie_popup_confirmation') ); ?>" />
            <p class="description">Laat leeg om geen button te tonen.</p>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="cookie_popup_confirmation_2">Bevestigingsbutton #2: tekst</label>
          </th>
          <td>
            <input type="text" name="cookie_popup_confirmation_2" id="cookie_popup_confirmation_2" class="regular-text" placeholder="Instellingen opslaan" value="<?php echo esc_attr( get_option('cookie_popup_confirmation_2') ); ?>" />
            <p class="description">Laat leeg om geen button te tonen.</p>
          </td>
        </tr>

      </tbody>
    </table>

    <!-- Submit -->
    <?php submit_button(); ?>

  </form>

</div>