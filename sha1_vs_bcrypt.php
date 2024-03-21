<?php

$password = 'An insecure password';

$starttime = microtime(true);
sha1($password);
$sha1Time = microtime(true) - $starttime;

$bcryptOptions = array('cost' => 14);
$starttime = microtime(true);
password_hash($password, PASSWORD_BCRYPT, $bcryptOptions);
$bcryptTime = microtime(true) - $starttime;

echo "sha1 took: $sha1Time s <br>";
echo "bcrypt took: $bcryptTime s <br>";
