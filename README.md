# Bright Cookie Notice Plugin

Awesome cookie notice with popup.

## Usage

Place this snippet in your theme where the notice should appear:

```
if (class_exists('Bright_Cookie_Notice') ) {
  $cookie_notice = new Bright_Cookie_Notice();
  $cookie_notice->get_display();
}
```

You can give users the option to reset their cookie settings:

```
<div class="js-delete-cookies">
  Cookie instellingen wijzigen
</div>
```