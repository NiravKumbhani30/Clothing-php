<?php
if (isset($_COOKIE['visitor_id'])) {
    unset($_COOKIE['visitor_id']);
    setcookie('visitor_id', null, -1, '/');
    return true;
}
?>