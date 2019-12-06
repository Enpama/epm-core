<?php
require ('vendor/autoload.php');
use epm\lib\Settings;
use epm\database\ConnectionManager;

$db = ConnectionManager::get();

var_dump($db);
