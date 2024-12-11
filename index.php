<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

// $client ->setClientId("193410126717-ikd5ffrpsinm710ug2oif5nbcj38q9oq.apps.googleusercontent.com");
// $client ->setClientSecret("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");
$client->setRedirectUri("http://localhost/google_login/redirect.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Google Login Example</title>
</head>
<body>

    <a href="<?= $url ?>">Sign in with Google</a>

</body>
</html>
