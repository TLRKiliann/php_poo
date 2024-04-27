<?php
    function get_username_from_cookie() {
        if(isset($_COOKIE['username'])) {
            return $_COOKIE['username'];
        } else {
            return false;
        }
    }
?>
