<?php

$xboxauth['domainname'] = '127.0.0.1:8000/www.letusplay.fr/user/';
$xboxauth['loginpage'] = 'login-xbox.php';
$xboxauth['logoutpage'] = 'login-xbox.php';

if (empty($xboxauth['domainname'])) {
    $xboxauth['domainname'] = $_SERVER['SERVER_NAME'];
}
if (empty($xboxauth['loginpage'])) {
    $xboxauth['loginpage'] = $_SERVER['PHP_SELF'];
}
if (empty($xboxauth['logoutpage'])) {
    $xboxauth['logoutpage'] = $_SERVER['PHP_SELF'];
}

