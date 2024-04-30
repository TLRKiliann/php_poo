# APP in PHP OOP

(under development)

## Purpose of the project (PHP - JS)

I wanted to build a PHP application to improve my skills in PHP OOP architecture with a homemade framework.

## Run application

`$ php -S localhost:8000`

& in the browser bar:

`localhost:8000/public/index.php`

## Game

I added a game to make my application more fun and to enrich my code with javascript. My goal was to switch values from php to javascript. The user can fight the computer by choosing between attack and defense.

**Files**

- class/Game.php
- pages/game.php
- public/js/game.js

---

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

**retrieve username from cookie**

```
require_once('cookie_helper.php');

$username = get_username_from_cookie();

if($username) {
    echo "Hello, $username !";
} else {
    echo "No username was found into the cookie.";
}
```

**retrieve cookie from others files**

`require_once('includes/cookie_helper.php');`

---

Types of paramters for a cookie:
================================

setcookie(
    string $name,
    string $value = "",
    int $expires_or_options = 0,
    string $path = "",
    string $domain = "",
    bool $secure = false,
    bool $httponly = false
): bool

---

Parameters of a cookie:
=======================

setcookie($name, $value = "", $expires_or_options = 0, $path = "", $domain = "", $secure = false, $httponly = false);

```
secure

    Indicates that the cookie should only be transmitted over a secure HTTPS connection from the client. When set to true, the cookie will only be set if a secure connection exists. On the server-side, it's on the programmer to send this kind of cookie only on secure connection (e.g. with respect to $_SERVER["HTTPS"]).
```

---

```
httponly

    When true the cookie will be made accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript. It has been suggested that this setting can effectively help to reduce identity theft through XSS attacks (although it is not supported by all browsers), but that claim is often disputed. true or false
```

It is important to avoid storing sensitive data in cookies. It is also possible to define a cookie for a single session, like this:

```
$datacookie = "value";
setcookie("username", $datacookie);
```

Otherwise, if expiration data has been defined, we need to store the time before the cookie was initialized,
as shown in the example below:

`setcookie("username", "", time() - 1)`;

# OOP

- class/Autoloader.php
- class/Form.php
- class/Game.php
- pages/home.php

