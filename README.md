# APP in PHP OOP

## Run application

`$ php -S localhost:8000`

& in the browser bar:

## Cookie

`includes/cookie_helper.php`

```
<?php
    function get_username_from_cookie() {
        if(isset($_COOKIE['username'])) {
            return $_COOKIE['username'];
        } else {
            return false;
        }
    }
?>
```
```
require_once('cookie_helper.php');

$username = get_username_from_cookie();

if($username) {
    echo "Hello, $username !";
} else {
    echo "No username was found into the cookie.";

