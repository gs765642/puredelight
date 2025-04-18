<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'project_puredelight';
$mysqli = new mysqli($hostname, $username, $password, $database);

define('FILE',__FILE__);
define('DIR',__DIR__);
if(!session_id()){
    session_start();
}
require_once('./functions.php');
require_once('./login-config.php');
