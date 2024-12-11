<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client();

// $client->setClientId("193410126717-ikd5ffrpsinm710ug2oif5nbcj38q9oq.apps.googleusercontent.com");
// $client->setClientSecret("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");
$client->setRedirectUri("http://localhost/google_login/redirect.php");

if (!$client->getRedirectUri()) {
    exit("Error: Redirect URI is not set correctly.");
}

if (!isset($_GET['code'])) {
    exit("Error: Authorization code not found.");
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

if (isset($token['error'])) {
    exit("Error fetching access token: " . $token['error_description']);
}

$client->setAccessToken($token['access_token']);

$oauth = new Google\Service\Oauth2($client);
$userinfo = $oauth->userinfo->get();

echo "Email: " . htmlspecialchars($userinfo->email) . "<br>";
echo "Family Name: " . htmlspecialchars($userinfo->familyName) . "<br>";
echo "Given Name: " . htmlspecialchars($userinfo->givenName) . "<br>";
echo "Full Name: " . htmlspecialchars($userinfo->name) . "<br>";
