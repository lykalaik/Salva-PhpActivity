<?php

require_once('db.php');

/**
 * Checks if the given parameters are set. If one of the specified parameters is not set,
 * die() is called.
 *
 * @param $parameters The parameters to check.
 */
function checkPOSTParametersOrDie($parameters) {
    foreach ($parameters as $parameter) {
        isset($_POST[$parameter]) || die("'$parameter' parameter must be set by POST method.");
    }
}

// Flow starts here.

checkPOSTParametersOrDie(['email', 'password']);

$username = $_POST['email'];
$password = $_POST['password'];

$db = new DB();

$authenticated = $db->authenticateUser($username, $password);

if ($authenticated) {
    $response = "Hello $username, you have been successfully authenticated.";
} else {
    $response = 'Incorrect credentials or user does not exist.';
}

echo $response;
