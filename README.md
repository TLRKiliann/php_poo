# APP in PHP OOP

## Purpose of the project (PHP - JS)

Simple game with action button to retrieve data from a PHP OOP via JavaScript. This can be found on the pages:

    class/Game.php
    pages/game.php
    js/game.js

## Run application

$ php -S localhost:8000

& in the browser bar:

localhost:8000

## Cookie

includes/cookie_helper.php

<?php
    function get_username_from_cookie() {
        if(isset($_COOKIE['username'])) {
            return $_COOKIE['username'];
        } else {
            return false;
        }
    }
?>

retrieve username from cookie

require_once('cookie_helper.php');

$username = get_username_from_cookie();

if($username) {
    echo "Hello, $username !";
} else {
    echo "No username was found into the cookie.";
}

retrieve cookie from others files

require_once('includes/cookie_helper.php');
