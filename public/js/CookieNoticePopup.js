function CookieNoticePopup() {

  // Do we have all required elements?
  var button = document.querySelector('.js-cookie-notice-popup-open')
  if (! button) return

  var popup = document.querySelector('.js-cookie-notice-popup')
  if (! popup) return

  var popupContainer = popup.querySelector('.js-cookie-notice-popup-container')
  if (! popupContainer) return

  // Open popup if click button
  button.addEventListener('click', function(e) {
    e.preventDefault()
    openPopup(popup, popupContainer)
  })

  /**
   * Open the popup
   */
  function openPopup(popup, popupContainer) {
    popup.classList.add('active')
  
    // If active, disable scrolling for everything but popupContainer
    if ( popup.classList.contains('active') ) {
      bodyScrollLock.disableBodyScroll(popupContainer)
    } else {
      bodyScrollLock.enableBodyScroll(popupContainer)
    }
  
    // Close via element
    var closers = popup.querySelectorAll('.js-cookie-notice-popup-button')
  
    Array.from(closers).forEach( function(closer) {
      closer.addEventListener('click', function() {
        closePopup(popup, popupContainer)
      })
    })

    // Close if click outside coverContainer
    popup.addEventListener('click', function(e) {
      if (! e.target.closest('.js-cookie-notice-popup-container')) {
        popup.classList.remove('active')
        bodyScrollLock.enableBodyScroll(popupContainer)
      }
    })
  }
  
  /**
   * Close the popup
   */
  function closePopup(popup, popupContainer) {
    popup.classList.remove('active')
    bodyScrollLock.enableBodyScroll(popupContainer)
  }
}