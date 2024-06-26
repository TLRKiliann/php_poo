# APP in PHP OOP (PHP - MySQL - JS - HTML - CSS)

(under development)

### Purpose of the project (PHP - JS)

I wanted to build a PHP application to improve my skills in PHP OOP architecture with a homemade framework.

### Run application

before folder my-app:

`$ php -S localhost:8000 -t my-app`

or into my-app:

`$ php -S localhost:8000`

& in the browser bar:

`localhost:8000/public/index.php`


## Structure of folders

This file /pages/templates/default.php interacts with public/index.php for routing.

You need only one time the `session_start()` for `home.php` & `article.php`.

**Dynamic routing**

- public/index.php

`ob_start() & ob_get_clean();` => to store require into `$content` (default.php), otherwise it will be erase.

```
    ob_start();
    if ($p === 'home') {
        require('../pages/home.php');
    } elseif ($p === 'article') {
        require('../pages/article.php');
    }
    $content = ob_get_clean();
    require('../pages/templates/default.php');
```

- pages/templates/default.php => $content

---

- old autoloader

```
    /**
        * @param $class string
    */
    static function autoload($class) {
        $class = str_replace('App\\', '', $class);
        $class = str_replace('\\', '/', $class);
        require '../app/' . $class . '.php';
    }
```

### Game

I added a game to make my application more fun and to enrich my code with javascript. My goal was to switch values from php to javascript. The user can fight the computer by choosing between attack and defense.

**Files**

- class/Game.php
- pages/game.php
- public/js/game.js

---

### Cookie

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

setcookie($name(of cookie), $value = "Esteban", $expires_or_options = 0, $path = "", $domain = "", $secure = false, $httponly = false);

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

### Delete cookie

Otherwise, if expiration data has been defined, we need to store the time before the date of creation,
as shown in the example below:

`setcookie("username", "", time() - 1)`;

### OOP

- class/Autoloader.php
- class/Form.php
- class/Game.php
- pages/home.php

### PDO

Test PDO with MySQL:
====================

Fetch all table articles as shown below:

```
    $pdo = new PDO('');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $pdo->query('SELECT * FROM articles');
    var_dump($res->fetchAll(PDO::FETCH_OBJ));
```

Return only one article from `articles` table:

```
    $pdo = new PDO('');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $pdo->query('SELECT * FROM articles');
    $data = $res->fetchAll(PDO::FETCH_OBJ);
    var_dump($data[0]->title);
```