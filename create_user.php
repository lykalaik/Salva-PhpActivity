<?php

require_once('db.php');

function checkGETParametersOrDie($parameters) {
    foreach ($parameters as $parameter) {
        isset($_GET[$parameter]) || die("'$parameter' parameter must be set by GET method.");
    }
}

checkGETParametersOrDie(['email', 'password']);

$username = $_GET['email'];
$password = $_GET['password'];

$db = new DB();
$db->createUser($username, $password);

echo "email '$username' has been created successfully.";

