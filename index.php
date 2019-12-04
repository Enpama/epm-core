<?php
require ('vendor/autoload.php');
use epm\core\lib\Settings;

echo Settings::get('database.name') . "\n";
echo Settings::get('security.cookie_key') . "\n";
echo Settings::get('test1.test2.test3') . "\n";
