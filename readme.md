Google Identity Services Login Demo
===================================

This demonstrates three methods for signing in with Google Identity Services. Aditional information can be found at [https://developers.google.com/identity](https://developers.google.com/identity)

Getting Started
---------------

1.  Create OAuth 2.0 Client ID: [Cloud Console -> APIs & Services -> Credentials -> OAuth 2.0 Client IDs](https://console.cloud.google.com/apis/credentials)
2.  Be sure to list authorizaed Javascript Origins
3.  Be sure to list redirect URIs
4.  Note your Client ID and update <a href="include/ga-credentials.php">include/ga-credentials.php"</a>

Demonstrations
--------------

*   [HTML Redirection](demo-redirect.php)
*   [JavaScript Handler](demo-js.php)
*   [JavaScript Handler w/ legacy support](demo-js.php) (creates the legacy googleUser object)