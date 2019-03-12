<?php

$steamauth['domainname'] = '127.0.0.1:8000/www.letusplay.fr/user/';
$steamauth['loginpage'] = 'login-steam.php';
$steamauth['logoutpage'] = 'login-steam.php';

if (empty($steamauth['domainname'])) {
    $steamauth['domainname'] = $_SERVER['SERVER_NAME'];
}
if (empty($steamauth['logoutpage'])) {
    $steamauth['logoutpage'] = $_SERVER['PHP_SELF'];
}
if (empty($steamauth['loginpage'])) {
    $steamauth['loginpage'] = $_SERVER['PHP_SELF'];
}