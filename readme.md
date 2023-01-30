Google Identity Services Login Demo
===================================

This demonstrates three methods for signing in with Google Identity Services with PHP. Additional information can be found at [https://developers.google.com/identity](https://developers.google.com/identity)

Getting Started
---------------

1.  Create OAuth 2.0 Client ID: [Cloud Console -> APIs & Services -> Credentials -> OAuth 2.0 Client IDs](https://console.cloud.google.com/apis/credentials)
2.  Be sure to list authorizaed Javascript Origins
3.  Be sure to list redirect URIs
4.  Note your Client ID and update include/ga-credentials.php (see <a href="include/ga-credentials.txt">ga-credentials.txt</a> for prototype)

Demonstrations
--------------

*   [HTML Redirection](demo-redirect.php)
*   [JavaScript Handler](demo-js.php)
*   [JavaScript Handler w/ legacy support](demo-js.php) (creates the legacy googleUser object)

Helpful Resources
--------------

*   [Google Identity Services](https://developers.google.com/identity)
*   [Installing Google PHP API](https://github.com/googleapis/google-api-php-client)
*   [JSON Web Tokens](https://jwt.io/)
