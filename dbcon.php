<?php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'mydb';

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($link->connect_error) { 
   die('Conn    ect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>