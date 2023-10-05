<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'meetups');
define('DB_PASSWORD', 'Klj56tFg9');
define('DB_NAME', 'meetups');
define('DB_USER_TBL', 'users');

// Google API configuration
define('GOOGLE_CLIENT_ID', '1046738803397-ln8fihj72b9fvp97lvt8bhh4agn3lpqa.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'Callback_URL');

// Start session
if(!session_id()){
    session_start();
}

// Include Google API client library
//require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/src/Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to MEETUPS');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);