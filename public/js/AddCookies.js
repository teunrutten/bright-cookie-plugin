function AddCookies() {
  var notice = document.querySelector('.js-cookie-notice')
  var popup = document.querySelector('.js-cookie-notice-popup')
  var buttons = document.querySelectorAll('.js-confirm-cookie')
  var analytics = null
  var tracking  = null

  if ( ! notice || ! popup || buttons.length < 1) return

  // If no consent has been give yet...
  if (!window.Cookies.get('bright_avg_cookie_consent')) {
    window.Cookies.set('bright_avg_no_cookie', 'no_cookie', { expires: 365 })
  }

  // If someone clicks to consent...
  ;[...buttons].forEach(button => {
    button.addEventListener('click', (e) => { 
      e.preventDefault()
      
      // Remove 'no consent given' cookie
      if (window.Cookies.get('bright_avg_no_cookie')) {
        window.Cookies.remove('bright_avg_no_cookie')
      }

      var checkboxes = popup.querySelectorAll('.js-cookie-checkbox')

      // Check which checkboxes are checked
      ;[...checkboxes].forEach(checkbox => {
        tracking  = (checkbox.name === 'tracking') ? checkbox.checked : tracking
        analytics = (checkbox.name === 'analytics') ? checkbox.checked : analytics 
      })

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