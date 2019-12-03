<?php
require ('vendor/autoload.php');
use epm\core\database\MySQL;

$m = new MySQL('', '', '', '', '');
var_dump($m);
