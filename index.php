<?php

require_once('tb.php');

$key          = ''; // Your Consumer Key
$secret       = ''; // Your Consumer Secret
$token        = ''; // Your Access Token
$token_secret = ''; // Your Token Secret

$bot = new TwitterBot($key, $secret, $token, $token_secret);

$bot->autoUnfollow();

echo "You have successfully unfollowed all people who were not following you back";

?>