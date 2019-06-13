function AddCookies() {
  var notice = document.querySelector('.js-cookie-notice')
  var popup = document.querySelector('.js-cookie-notice-popup')
  var buttons = document.querySelectorAll('.js-confirm-cookie')
  var analytics = null
  var tracking  = null

  if ( ! notice || buttons.length < 1) return

  // If no consent has been give yet...
  if (!window.Cookies.get('bright_avg_cookie_consent')) {
    window.Cookies.set('bright_avg_no_cookie', 'no_cookie', { expires: 365 })
  }

  // If someone clicks to consent...
  Array.from(buttons).forEach( function(button) {
    button.addEventListener('click', function(e) { 
      e.preventDefault()
      
      // Remove 'no consent given' cookie
      if (window.Cookies.get('bright_avg_no_cookie')) {
        window.Cookies.remove('bright_avg_no_cookie')
      }

      // Do we have a popup? Use the checkboxes
      if ( popup ) {
        var analytics_checkbox  = popup.querySelector('.js-cookie-checkbox-analytics')
        var tracking_checkbox   = popup.querySelector('.js-cookie-checkbox-tracking')
        var analytics_checkmark = popup.querySelector('.js-cookie-checkmark-analytics')
        var tracking_checkmark  = popup.querySelector('.js-cookie-checkmark-tracking')

        // Analytics is ON if there's a checkmark, or if the checkbox is checked.
        if ( analytics_checkmark || (analytics_checkbox && analytics_checkbox.checked) ) {
          analytics = true
        }

        // Tracking is ON if there's a checkmark, or if the checkbox is checked.
        if ( tracking_checkmark || (tracking_checkbox && tracking_checkbox.checked) ) {
          tracking = true
        }

      // No popup? Use the data attr settings
      } else {
        tracking  = (notice.dataset.tracking === 'on') ? true : false
        analytics = (notice.dataset.analytics === 'on') ? true : false
      }

      // Set the correct cookie value
      setBrightCookieValue(analytics, tracking)

      // Hide the cookie notice after consent has been given
      if (window.Cookies.get('bright_avg_cookie_consent')) {
        notice.classList.remove('active')
      }

    })
  })

  /**
   * Set the correct cookie value based
   * on analytics and tracking
   */
  function setBrightCookieValue(analytics, tracking) {
    if (analytics && tracking) {
      window.Cookies.set(
        'bright_avg_cookie_consent',
        'analytics_tracking',
        {
          expires: 365
        }
      )

    } else if (analytics) {
      window.Cookies.set('bright_avg_cookie_consent', 'analytics', {
        expires: 1
      })

    } else if (tracking) {
      window.Cookies.set('bright_avg_cookie_consent', 'tracking', {
        expires: 365
      })

    } else {
      window.Cookies.set('bright_avg_cookie_consent', 'none', {
        expires: 1
      })
    }
  }

}