<?php
define("DB_HOST", 'localhost');


define("DB_NAME", 'test');
define("DB_USER", 'root');
define("DB_PASS", '');

// set site path and redirect URL
/* make sure the url end with a trailing slash */
define("SITE_URL", "http://31.13.253.92//");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."loginGooglePlus.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "27443114197-otsfs6ra179qehq0mn2jf0ocbfpjihrs.apps.googleusercontent.com");
define("CLIENT_SECRET", "TWpvH_0nRlXi7Q8Y3ePD9e2h");

// retreive information from user based on scope/permission
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );

/* logout both from Google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));

