function RemoveCookies() {
  var buttons = document.querySelectorAll('.js-delete-cookies')
  if (buttons.length < 1) return

  ;[...buttons].forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault()
      removeCookieConsent()
    })
  })

  function removeCookieConsent() {
    if (window.Cookies.get('bright_avg_cookie_consent')) {
      window.Cookies.remove('bright_avg_cookie_consent')
      window.location = window.location.href
      window.location.reload()
    }
  }
}