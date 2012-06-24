This is a copy from login_redirect_help(), implementation of hook_help(), in
login_redirect.module, slightly modified to suit the situation. You may view it
at admin/help/login_redirect.

About
------------

A simple solution to allow redirects toward non-Drupal URLs after a successful
user login.

Author(s):
  legendm33066 <http://drupal.org/user/1290564>

Installation
------------

1. Place this module directory in your modules folder (usually
sites/all/modules/).

2. Go to "Modules" (admin/modules) and enable the module.

3. Visit the Settings page (admin/login_redirect/settings) and make sure it's
configured correctly.

Uses
------------

Visit the Login page (usually user/login) and append the redirection URL
parameter using the parameter name defined in the Settings page
(admin/login_redirect/settings). For example, if you set the parameter name to
"destination", then you would visit user/login?destination=http://www.google.com
to have the user redirected to Google (http://www.google.com) after logging in.

Please note that the URL passed parameter ALWAYS overrides the destination
parameter handled by Drupal itself.
